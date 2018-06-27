<?php

namespace App\Http\Controllers;

use App\Command;
use App\Order;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommandResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commands = Command::orderBy('cmd_order_id')->paginate(10);
        return view('EdaContent.displayCommands', ['commands' => $commands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EdaContent.addCommand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request)
        {
            $post_order = $request->get('command_order');
            $post_response = $request->get('command_response');
            $is_command = $request->get('is_command');

            //create a logic that checks in order table if order exist. Add if not exist, if exist just get the order id.
            $order = Order::firstOrNew(['cmd_order_text' => $post_order]);
            $order->save();

            //create a logic that checks in responses table if response existed. Add if not exist, if exist just get the response id.
            $response = Response::firstOrNew(['cmd_response_text' => $post_response]);
            $response->save();

            //Restore newly created command if exist in database but soft deleted. Should not create new data.
            $restoreCommand = Command::withTrashed()
                                ->orderId(($order->order_id ? $order->order_id : $order->id))
                                ->responseId(($response->response_id ? $response->response_id : $response->id))
                                ->commandType($is_command)
                                ->isActive()
                                ->restore();

            //If command is new and not soft deleted, create new command.
            if(isset($restoreCommand)) //If $restoreCommand didn't restore any soft deleted command.
            {
                $command = Command::firstOrNew([
                    'cmd_order_id' => ($order->order_id ? $order->order_id : $order->id), //gets the new or existing order id of newly created order.
                    'cmd_response_id' => ($response->response_id ? $response->response_id : $response->id), //gets the new or existing response id of newly created response.
                    'is_command' => $is_command,
                    'status' => 1
                ]);
                $command->save();
            }

            return redirect('/commands');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $command = Command::commandId($id)->first();

        return view('EdaContent.updateCommand')->with('command', $command)->with(['message_header' => '', 'message_body' => '', 'message_type' => '']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request && $id)
        {
            $updated_order = $request->get('command_order');
            $updated_response = $request->get('command_response');
            $updated_is_command = $request->get('is_command');

            //create a logic that checks in order table if order exist. Add if not exist, if exist just get the order id.
            $order = Order::firstOrNew(['cmd_order_text' => $updated_order]);
            $order->save();

            //create a logic that checks in responses table if response existed. Add if not exist, if exist just get the response id.
            $response = Response::firstOrNew(['cmd_response_text' => $updated_response]);
            $response->save();

            //check if updated command already exist
            $command = Command::orderId(($order->order_id ? $order->order_id : $order->id))
                                ->responseId(($response->response_id ? $response->response_id : $response->id))
                                ->commandType($updated_is_command)
                                ->isActive();

            if($command->count()) //If updated command already exist, show error message.
            {
                $message_header = "Update Failed";
                $message_body = "Command already existed! If you dont need this command anymore, you can just delete this command.";
                return redirect('/commands/'.$id.'/edit')
                    ->with(['message_header' => $message_header, 'message_body' => $message_body, 'message_type' => 'error']);
            }
            else{
                $command = Command::commandId($id)
                    ->update(['cmd_order_id' => ($order->order_id ? $order->order_id : $order->id), 'cmd_response_id' => ($response->response_id ? $response->response_id : $response->id), 'is_command' => $updated_is_command]);

                if($command) {
                    return redirect('/commands');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
    }

    public function deleteCommand($command_id)
    {
        $command = Command::destroy($command_id);

        return redirect('/commands');
    }
}
