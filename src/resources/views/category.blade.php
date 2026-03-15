@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__message">
  @if (session('message'))
  <div class="category__message--success">
    {{ session('message')}}
  </div>
  @endif
  @if ($errors->any())
  <div class="category__message--error">
    <ul>
      @foreach ($errors->all() as $error)
      <li> {{$error}} </li>
      @endforeach
    </ul>
  </div>
  @endif
  
</div>

<div class="category__content">
  <form class="create-form" action="/categories" method="post">
    @csrf
    <div class="create-form__item">
      <input class="create-form__input" type="text" name="name">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit">作成</button>
    </div>
  </form>
  <div class="category-table">
    <table class="category-table__inner">
      <colgroup>
        <col style="width:88%">
        <col style="width:80px">
        <col style="width:80px">
      </colgroup>
      <tr>
        <th class="category-table__header">category</th>
        <th class="category-table__header"></th>
        <th class="category-table__header"></th>
      </tr>
      @foreach ($categories as $category)
      <tr class="category-table__row">
        <td>
          <form class="update-form" action="/categories/update" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $category['id'] }}">
            <input class="update-form__item" type="text" name="name" value="{{ $category['name']}}">
        </td>
        <td>
          <button class="update-form__button">更新</button>
          </form>
        </td>
        <td>
          <form class="delete-form" action="/categories/delete" method="post">
          @method('DELETE')
          @csrf
            <input type="hidden" name="id" value="{{ $category['id']}}">
            <button class="delete-form__button" type="submit">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>

@endsection