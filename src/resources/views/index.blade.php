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
  <div class="todo__message--error">

  </div>
</div>

<div class="todo__content">
  <form class="create-form" action="/todos" method="post">
    @csrf
    <div class="create-form__item">
      <input class="create-form__item-input" type="text" name="content">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit">作成</button>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <colgroup>
        <col style="width:85%">
        <col style="width:6%">
        <col style="width:6%">
      </colgroup>
      <tr>
        <th class="todo-table__header">Todo</th>
        <th class="todo-table__header"></th>
        <th class="todo-table__header"></th>
      </tr>
      @foreach ($todos as $todo)
      <tr class="todo-table__row">
        <form class="update-form" action="/todos/update" method="post">
          @csrf
          <td class="update-form__item">{{ $todo['content']}}</td>
          <td class="update-form__button">
            <button class="update-form__button-submit">更新</button>
          </td>
        </form>
        <form class="delete-form" action="/todos/delete" method="post">
          @csrf
          <td class="delete-form__button">
            <button class="delete-form__button-submit">削除</button>
          </td>
        </form>
      </tr>
      @endforeach
    </table>
  </div>
</div>

@endsection