<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //取得ファンクション
    public function getTodos(){
        $todos = Todo::all();//DBから全取得
        
        return $todos;
    }
    //データ登録ファンクション
    //引数に対象のクリックされた内容をレスポンスとして受け取る
    public function addTodo(Request $request){
        $todo = new Todo();//Todoクラスのオブジェクト作成
        $todo->title = $request->title;//リクエストのタイトルを取得
        $todo->save();//登録更新

        $todos = Todo::all();//最新データの取得
        return $todos;
    }

    //データ削除ファンクション
    //引数に対象のクリックされた内容をレスポンスとして受け取る
    public function deleteTodo(Request $request){
        $todo = Todo::find($request->id);//対象IDデータのオブジェクトを掴む
        $todo->delete();

        $todos = Todo::all();//最新データの全件を取得する
        return $todos;

    }

}
