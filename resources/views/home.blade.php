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
    <input type="button" id="openBtn" value="+" class="openBtn">
    <input type="button" class="setting" value="設定">
    <a href="{{route('logout')}}"><input type="button" value="ログアウト"></a>
  </header>
  <main>
    <div id="modal" class="modal">
      <div class="modal__content">
        <div class="modal__content-inner">
          <form action="/create" method="post">
            <table>
              <tr>
                <th>会社名</th>
                <td>
                  <input type="text" name="company">
                </td>
              </tr>
              <tr>
                <th>代表者名</th>
                <td>
                  <input type="text" name="name">
                </td>
              </tr>
              <tr>
                <th>電話番号</th>
                <td>
                  <input type="text" name="tel">
                </td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td>
                  <input type="text" name="email">
                </td>
              </tr>
              <tr>
                <th>セールスステータス</th>
                <td>
                  <select name="status">
                    <option value="{{$statuses->status1}}">
                      {{$statuses->status1}}
                    </option>
                    <option value="{{$statuses->status2}}">
                      {{$statuses->status2}}
                    </option>
                    <option value="{{$statuses->status3}}">
                      {{$status->status3}}
                    </option>
                    <option value="{{$statuses->status4}}">
                      {{$statuses->status4}}
                    </option>
                    <option value="{{$statuses->status5}}">
                      {{$statuses->status5}}
                    </option>
                  </select>
                </td>
              </tr>
            </table>
            <input type="button" id="createBtn" value="追加">
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="/js/main.js"></script>
</body>

</html>