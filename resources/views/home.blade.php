<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SalesManagement</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/home.css">
</head>

<body>
  <header class="header">
    <h1><a href="/home">SalesManagement</a></h1>
    <div class="header_btn">
      <input type="button" id="openBtn" value="+" class="openBtn">
      <input type="button" class="setting" value="設定">
      <a href="{{route('logout')}}"><input type="button" class="logout" value="ログアウト"></a>
    </div>
  </header>
  <main>
    <div id="modal" class="modal">
      <div class="modal__content">
        <div class="modal__content-inner">
          <form action="/create" class="form_create" method="post">
            @csrf
            <table>
              @error('company')
              <tr>
                <td>{{$message}}</td>
              </tr>
              @enderror
              <tr>
                <th>会社名</th>
                <td>
                  <input type="text" name="company">
                </td>
              </tr>
              @error('name')
              <tr>
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
              <tr>
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
              <tr>
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
                  <select name="status" class="status">
                    @foreach ($statuses as $status)
                    <option value="{{$status->status}}">
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
  </main>
  <script src="/js/main.js"></script>
</body>

</html>