<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SalesManagement -ステータス設定-</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/home.css">
</head>

<body>
  <!-- ヘッダー -->
  <header class="header">
    <h1><a href="/home">SalesManagement</a></h1>
    <div class="header_btn">
      <input type="button" id="openBtn" value="+" class="openBtn">
      <a href="{{route('setting')}}"><input type="button" class="setting" value="設定"></a>
      <a href="{{route('logout')}}"><input type="button" class="logout" value="ログアウト"></a>
    </div>
  </header>
  <!-- メイン -->
  <main>
    <div class="setting_content">
      <h3>セールスステータス設定</h3>
      <div class="setting_table">
        <form action="/setting" class="status_update" name="setting_form" method="post" class="setting_update">
          @csrf
          <table>
            <tr class="status_tr">
              <th>ステータス1</th>
              <th>ステータス2</th>
              <th>ステータス3</th>
              <th>ステータス4</th>
              <th>ステータス5</th>
            </tr>
            <tr>
              @foreach($statuses as $status)
              <td>
                <input type="text" name="status{{$status->id}}" value="{{$status->status}}">
              </td>
              @endforeach
            </tr>
            <tr class="error_tr">
              <td>
                @error('status1')
                {{$message}}
                @enderror
              </td>
              <td>
                @error('status2')
                {{$message}}
                @enderror
              </td>
              <td>
                @error('status3')
                {{$message}}
                @enderror
              </td>
              <td>
                @error('status4')
                {{$message}}
                @enderror
              </td>
              <td>
                @error('status5')
                {{$message}}
                @enderror
              </td>
            </tr>
          </table>
          <div class="setting_update_btn_parent">
            <input type="submit" class="setting_update_btn" value="更新">
          </div>
        </form>
      </div>
    </div>
    <!-- モーダル1・追加 -->
    <div id="modal" class="modal">
      <div class="modal__content">
        <div class="modal__content-inner">
          <input type="button" class="create_close" id="closeBtn" value="×">
          <form action="/create" class="form_create" method="post">
            @csrf
            <table>
              @error('company')
              <tr class="error_tr">
                <th></th>
                <td>{{$message}}</td>
              </tr>
              @enderror
              <tr>
                <th>会社名<span class="required">*</span></th>
                <td>
                  <input type="text" name="company">
                </td>
              </tr>
              @error('name')
              <tr class="error_tr">
                <th></th>
                <td>{{$message}}</td>
              </tr>
              @enderror
              <tr>
                <th>代表者名</th>
                <td>
                  <input type="text" name="name">
                </td>
              </tr>
              @error('tel')
              <tr class="error_tr">
                <th></th>
                <td>{{$message}}</td>
              </tr>
              @enderror
              <tr>
                <th>電話番号</th>
                <td>
                  <input type="text" name="tel">
                </td>
              </tr>
              @error('email')
              <tr class="error_tr">
                <th></th>
                <td>{{$message}}</td>
              </tr>
              @enderror
              <tr>
                <th>メールアドレス</th>
                <td>
                  <input type="text" name="email">
                </td>
              </tr>
              <tr>
                <th>セールスステータス</th>
                <td>
                  <select name="status_id" class="status">
                    @foreach ($statuses as $status)
                    <option value="{{$status->id}}">
                      {{$status->status}}
                    </option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </table>
            <input type="submit" class="create_btn" id="createBtn" value="追加">
          </form>
        </div>
      </div>
    </div>
    <div class="newstatus">
      <form action="/newsetting" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$users->id}}">
        <table>
          <tr>
            <th>ステータス1</th>
            <th>ステータス2</th>
            <th>ステータス3</th>
            <th>ステータス4</th>
            <th>ステータス5</th>
          </tr>
          <tr>
            <td><input type="text" name="status1" @if($newstatus !=null)value="{{$newstatus->status1}}" @endif></td>
            <td><input type="text" name="status2" @if($newstatus !=null)value="{{$newstatus->status2}}" @endif></td>
            <td><input type="text" name="status3" @if($newstatus !=null)value="{{$newstatus->status3}}" @endif></td>
            <td><input type="text" name="status4" @if($newstatus !=null)value="{{$newstatus->status4}}" @endif></td>
            <td><input type="text" name="status5" @if($newstatus !=null)value="{{$newstatus->status5}}" @endif></td>
          </tr>
        </table>
        <input type="submit" value="更新">
      </form>
    </div>
    <div>
      <select name="" id="">
        <option value="1">{{$newstatus->status1}}</option>
        <option value="2">{{$newstatus->status2}}</option>
        <option value="3">{{$newstatus->status3}}</option>
        <option value="4">{{$newstatus->status4}}</option>
        <option value="5">{{$newstatus->status5}}</option>
      </select>
    </div>
  </main>
  <!-- アラート -->
  <script>
    @if(count($errors) > 0)
    alert("入力が正しくありません。")
    @endif
  </script>
  <script src="/js/main.js"></script>
</body>