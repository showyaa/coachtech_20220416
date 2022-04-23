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
  <!-- ヘッダー -->
  <header class="header">
    <h1><a href="/home">SalesManagement</a></h1>
    <div class="header_btn">
      <input type="button" id="openBtn" value="+" class="openBtn">
      <a href="{{route('setting')}}"><input type="button" class="setting" value="設定"></a>
      <a href="{{route('logout')}}"><input type="button" class="logout" value="ログアウト"></a>
    </div>
  </header>
  <main>
    <!-- 検索 -->
    <form action="/find" method="post" class="form_find">
      @csrf
      <input type="text" class="find_space" name="search" value="{{$input}}" placeholder="企業名または代表者名で検索">
      <input type="submit" class="find_btn" value="検索">
    </form>
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
    <!-- メイン（グリッドレイアウト） -->
    <div class="tables">
      <div class="box1"><p>{{$statuses[0]->status}}</p></div>
      <div class="box2"><p>{{$statuses[1]->status}}</p></div>
      <div class="box3"><p>{{$statuses[2]->status}}</p></div>
      <div class="box4"><p>{{$statuses[3]->status}}</p></div>
      <div class="box5"><p>{{$statuses[4]->status}}</p></div>
      <!-- ステータス1 -->
      <div class="box1_table">
        <table class="tables_table">
          @if(@isset($items1))
          @foreach($items1 as $item)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$item->id}}" class="open_update">
                {{$item->company}}
              </p>
              <div id="modal2_{{$item->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$item->id}}" value="×">
                    <form action="/update?id={{$item->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$item->company}}">
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
                            <input type="text" name="name" value="{{$item->name}}">
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
                            <input type="text" name="tel" value="{{$item->tel}}">
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
                            <input type="text" name="email" value="{{$item->email}}">
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
                      <div class="update_delete">
                          <input type="submit" class="update_btn" id="updateBtn" value="更新">
                    </form>
                    <br>
                        <form action="/delete?id={{$item->id}}" method="post" class="form_delete">
                          @csrf
                          <input type="submit" class="delete_btn" value="削除">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <script>
            const open_update_{{$item->id}} = document.getElementById('open_update_{{$item->id}}');
            const close_update_{{$item->id}} = document.getElementById('update_close_btn_{{$item->id}}');
            const modal2_{{$item->id}} = document.getElementById('modal2_{{$item->id}}');
            open_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'block';
            })
            close_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$item->id}}") {
                modal2_{{$item->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
          @endif
        </table>
      </div>
      <!-- ステータス2 -->
      <div class="box2_table">
        <table class="tables_table">
          @if(@isset($items2))
          @foreach($items2 as $item)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$item->id}}" class="open_update">
                {{$item->company}}
              </p>
              <div id="modal2_{{$item->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$item->id}}" value="×">
                    <form action="/update?id={{$item->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$item->company}}">
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
                            <input type="text" name="name" value="{{$item->name}}">
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
                            <input type="text" name="tel" value="{{$item->tel}}">
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
                            <input type="text" name="email" value="{{$item->email}}">
                          </td>
                        </tr>
                        <tr>
                          <th>セールスステータス</th>
                          <td>
                            <select name="status_id" class="status">
                              <option value="{{$statuses[0]->id}}">
                                {{$statuses[0]->status}}
                              </option>
                              <option value="{{$statuses[1]->id}}" selected>
                                {{$statuses[1]->status}}
                              </option>
                              <option value="{{$statuses[2]->id}}">
                                {{$statuses[2]->status}}
                              </option>
                              <option value="{{$statuses[3]->id}}">
                                {{$statuses[3]->status}}
                              </option>
                              <option value="{{$statuses[4]->id}}">
                                {{$statuses[4]->status}}
                              </option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      <div class="update_delete">
                          <input type="submit" class="update_btn" id="updateBtn" value="更新">
                    </form>
                    <br>
                        <form action="/delete?id={{$item->id}}" method="post" class="form_delete">
                          @csrf
                          <input type="submit" class="delete_btn" value="削除">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <script>
            const open_update_{{$item->id}} = document.getElementById('open_update_{{$item->id}}');
            const close_update_{{$item->id}} = document.getElementById('update_close_btn_{{$item->id}}');
            const modal2_{{$item->id}} = document.getElementById('modal2_{{$item->id}}');
            open_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'block';
            })
            close_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$item->id}}") {
                modal2_{{$item->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
          @endif
        </table>
      </div>
      <!-- ステータス3 -->
      <div class="box3_table">
        <table class="tables_table">
          @if(@isset($items3))
          @foreach($items3 as $item)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$item->id}}" class="open_update">
                {{$item->company}}
              </p>
              <div id="modal2_{{$item->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$item->id}}" value="×">
                    <form action="/update?id={{$item->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$item->company}}">
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
                            <input type="text" name="name" value="{{$item->name}}">
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
                            <input type="text" name="tel" value="{{$item->tel}}">
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
                            <input type="text" name="email" value="{{$item->email}}">
                          </td>
                        </tr>
                        <tr>
                          <th>セールスステータス</th>
                          <td>
                            <select name="status_id" class="status">
                              <option value="{{$statuses[0]->id}}">
                                {{$statuses[0]->status}}
                              </option>
                              <option value="{{$statuses[1]->id}}">
                                {{$statuses[1]->status}}
                              </option>
                              <option value="{{$statuses[2]->id}}" selected>
                                {{$statuses[2]->status}}
                              </option>
                              <option value="{{$statuses[3]->id}}">
                                {{$statuses[3]->status}}
                              </option>
                              <option value="{{$statuses[4]->id}}">
                                {{$statuses[4]->status}}
                              </option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      <div class="update_delete">
                          <input type="submit" class="update_btn" id="updateBtn" value="更新">
                    </form>
                    <br>
                        <form action="/delete?id={{$item->id}}" method="post" class="form_delete">
                          @csrf
                          <input type="submit" class="delete_btn" value="削除">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <script>
            const open_update_{{$item->id}} = document.getElementById('open_update_{{$item->id}}');
            const close_update_{{$item->id}} = document.getElementById('update_close_btn_{{$item->id}}');
            const modal2_{{$item->id}} = document.getElementById('modal2_{{$item->id}}');
            open_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'block';
            })
            close_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$item->id}}") {
                modal2_{{$item->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
          @endif
        </table>
      </div>
      <!-- ステータス4 -->
      <div class="box4_table">
        <table class="tables_table">
          @if(@isset($items4))
          @foreach($items4 as $item)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$item->id}}" class="open_update">
                {{$item->company}}
              </p>
              <div id="modal2_{{$item->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$item->id}}" value="×">
                    <form action="/update?id={{$item->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$item->company}}">
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
                            <input type="text" name="name" value="{{$item->name}}">
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
                            <input type="text" name="tel" value="{{$item->tel}}">
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
                            <input type="text" name="email" value="{{$item->email}}">
                          </td>
                        </tr>
                        <tr>
                          <th>セールスステータス</th>
                          <td>
                            <select name="status_id" class="status">
                              <option value="{{$statuses[0]->id}}">
                                {{$statuses[0]->status}}
                              </option>
                              <option value="{{$statuses[1]->id}}">
                                {{$statuses[1]->status}}
                              </option>
                              <option value="{{$statuses[2]->id}}">
                                {{$statuses[2]->status}}
                              </option>
                              <option value="{{$statuses[3]->id}}" selected>
                                {{$statuses[3]->status}}
                              </option>
                              <option value="{{$statuses[4]->id}}">
                                {{$statuses[4]->status}}
                              </option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      <div class="update_delete">
                          <input type="submit" class="update_btn" id="updateBtn" value="更新">
                    </form>
                    <br>
                        <form action="/delete?id={{$item->id}}" method="post" class="form_delete">
                          @csrf
                          <input type="submit" class="delete_btn" value="削除">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <script>
            const open_update_{{$item->id}} = document.getElementById('open_update_{{$item->id}}');
            const close_update_{{$item->id}} = document.getElementById('update_close_btn_{{$item->id}}');
            const modal2_{{$item->id}} = document.getElementById('modal2_{{$item->id}}');
            open_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'block';
            })
            close_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$item->id}}") {
                modal2_{{$item->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
          @endif
        </table>
      </div>
      <!-- ステータス5 -->
      <div class="box5_table">
        <table class="tables_table">
          @if(@isset($items5))
          @foreach($items5 as $item)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$item->id}}" class="open_update">
                {{$item->company}}
              </p>
              <div id="modal2_{{$item->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$item->id}}" value="×">
                    <form action="/update?id={{$item->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$item->company}}">
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
                            <input type="text" name="name" value="{{$item->name}}">
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
                            <input type="text" name="tel" value="{{$item->tel}}">
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
                            <input type="text" name="email" value="{{$item->email}}">
                          </td>
                        </tr>
                        <tr>
                          <th>セールスステータス</th>
                          <td>
                            <select name="status_id" class="status">
                              <option value="{{$statuses[0]->id}}">
                                {{$statuses[0]->status}}
                              </option>
                              <option value="{{$statuses[1]->id}}">
                                {{$statuses[1]->status}}
                              </option>
                              <option value="{{$statuses[2]->id}}">
                                {{$statuses[2]->status}}
                              </option>
                              <option value="{{$statuses[3]->id}}">
                                {{$statuses[3]->status}}
                              </option>
                              <option value="{{$statuses[4]->id}}" selected>
                                {{$statuses[4]->status}}
                              </option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      <div class="update_delete">
                          <input type="submit" class="update_btn" id="updateBtn" value="更新">
                    </form>
                    <br>
                        <form action="/delete?id={{$item->id}}" method="post" class="form_delete">
                          @csrf
                          <input type="submit" class="delete_btn" value="削除">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <script>
            const open_update_{{$item->id}} = document.getElementById('open_update_{{$item->id}}');
            const close_update_{{$item->id}} = document.getElementById('update_close_btn_{{$item->id}}');
            const modal2_{{$item->id}} = document.getElementById('modal2_{{$item->id}}');
            open_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'block';
            })
            close_update_{{$item->id}}.addEventListener('click', () => {
              modal2_{{$item->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$item->id}}") {
                modal2_{{$item->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
          @endif
        </table>
      </div>
    </div>
  </main>
  <!-- アラート -->
    <script>
    @if (count($errors) >0)
        alert("入力が正しくありません。")
    @endif
  </script>
  <script src="/js/main.js"></script>
</body>

</html>