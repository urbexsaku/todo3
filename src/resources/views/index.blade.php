@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__message">
  @if (session('message'))
  <div class="todo__message--success">
    {{ session('message')}}
  </div>
  @endif
  @if ($errors->any())
  <div class="todo__message--error">
    <ul>
      @foreach ($errors->all() as $error)
      <li> {{$error}} </li>
      @endforeach
    </ul>
  </div>
  @endif
  
</div>

<div class="todo__content">
  <form class="create-form" action="/todos" method="post">
    @csrf
    <div class="create-form__item">
      <input class="create-form__input" type="text" name="content">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit">作成</button>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <colgroup>
        <col style="width:88%">
        <col style="width:80px">
        <col style="width:80px">
      </colgroup>
      <tr>
        <th class="todo-table__header">Todo</th>
        <th class="todo-table__header"></th>
        <th class="todo-table__header"></th>
      </tr>
      @foreach ($todos as $todo)
      <tr class="todo-table__row">
        <td>
          <form class="update-form" action="/todos/update" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $todo['id'] }}">
            <input class="update-form__item" type="text" name="content" value="{{ $todo['content']}}">
        </td>
        <td>
          <button class="update-form__button">更新</button>
          </form>
        </td>
        <td>
          <form class="delete-form" action="/todos/delete" method="post">
          @method('DELETE')
          @csrf
            <input type="hidden" name="id" value="{{ $todo['id']}}">
            <button class="delete-form__button" type="submit">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>

@endsection