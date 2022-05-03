<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SalesManagement -ホーム-</title>
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
            <input type="hidden" name="user_id" value="{{$users->id}}">
            <input type="submit" class="create_btn" id="createBtn" value="追加">
          </form>
        </div>
      </div>
    </div>
    <!-- メイン（グリッドレイアウト） -->
    <div class="tables">
      <div class="box1"><p>@if($statuses[0] != null){{$statuses[0]->status}}@endif</p></div>
      <div class="box2"><p>{{$statuses[1]->status}}</p></div>
      <div class="box3"><p>{{$statuses[2]->status}}</p></div>
      <div class="box4"><p>{{$statuses[3]->status}}</p></div>
      <div class="box5"><p>{{$statuses[4]->status}}</p></div>
      <!-- ステータス1 -->
      <div class="box1_table">
        <table class="tables_table">
          @foreach($companies1 as $company1)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$company1->id}}" class="open_update">
                {{$company1->company}}
              </p>
              <div id="modal2_{{$company1->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$company1->id}}" value="×">
                    <form action="/update?id={{$company1->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$company1->company}}">
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
                            <input type="text" name="name" value="{{$company1->name}}">
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
                            <input type="text" name="tel" value="{{$company1->tel}}">
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
                            <input type="text" name="email" value="{{$company1->email}}">
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
                        <form action="/delete?id={{$company1->id}}" method="post" class="form_delete">
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
            const open_update_{{$company1->id}} = document.getElementById('open_update_{{$company1->id}}');
            const close_update_{{$company1->id}} = document.getElementById('update_close_btn_{{$company1->id}}');
            const modal2_{{$company1->id}} = document.getElementById('modal2_{{$company1->id}}');
            open_update_{{$company1->id}}.addEventListener('click', () => {
              modal2_{{$company1->id}}.style.display = 'block';
            })
            close_update_{{$company1->id}}.addEventListener('click', () => {
              modal2_{{$company1->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$company1->id}}") {
                modal2_{{$company1->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
        </table>
      </div>
      <!-- ステータス2 -->
      <div class="box2_table">
        <table class="tables_table">
          @foreach($companies2 as $company2)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$company2->id}}" class="open_update">
                {{$company2->company}}
              </p>
              <div id="modal2_{{$company2->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$company2->id}}" value="×">
                    <form action="/update?id={{$company2->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$company2->company}}">
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
                            <input type="text" name="name" value="{{$company2->name}}">
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
                            <input type="text" name="tel" value="{{$company2->tel}}">
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
                            <input type="text" name="email" value="{{$company2->email}}">
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
                        <form action="/delete?id={{$company2->id}}" method="post" class="form_delete">
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
            const open_update_{{$company2->id}} = document.getElementById('open_update_{{$company2->id}}');
            const close_update_{{$company2->id}} = document.getElementById('update_close_btn_{{$company2->id}}');
            const modal2_{{$company2->id}} = document.getElementById('modal2_{{$company2->id}}');
            open_update_{{$company2->id}}.addEventListener('click', () => {
              modal2_{{$company2->id}}.style.display = 'block';
            })
            close_update_{{$company2->id}}.addEventListener('click', () => {
              modal2_{{$company2->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$company2->id}}") {
                modal2_{{$company2->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
        </table>
      </div>
      <!-- ステータス3 -->
      <div class="box3_table">
        <table class="tables_table">
          @foreach($companies3 as $company3)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$company3->id}}" class="open_update">
                {{$company3->company}}
              </p>
              <div id="modal2_{{$company3->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$company3->id}}" value="×">
                    <form action="/update?id={{$company3->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$company3->company}}">
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
                            <input type="text" name="name" value="{{$company3->name}}">
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
                            <input type="text" name="tel" value="{{$company3->tel}}">
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
                            <input type="text" name="email" value="{{$company3->email}}">
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
                        <form action="/delete?id={{$company3->id}}" method="post" class="form_delete">
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
            const open_update_{{$company3->id}} = document.getElementById('open_update_{{$company3->id}}');
            const close_update_{{$company3->id}} = document.getElementById('update_close_btn_{{$company3->id}}');
            const modal2_{{$company3->id}} = document.getElementById('modal2_{{$company3->id}}');
            open_update_{{$company3->id}}.addEventListener('click', () => {
              modal2_{{$company3->id}}.style.display = 'block';
            })
            close_update_{{$company3->id}}.addEventListener('click', () => {
              modal2_{{$company3->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$company3->id}}") {
                modal2_{{$company3->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
        </table>
      </div>
      <!-- ステータス4 -->
      <div class="box4_table">
        <table class="tables_table">
          @foreach($companies4 as $company4)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$company4->id}}" class="open_update">
                {{$company4->company}}
              </p>
              <div id="modal2_{{$company4->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$company4->id}}" value="×">
                    <form action="/update?id={{$company4->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$company4->company}}">
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
                            <input type="text" name="name" value="{{$company4->name}}">
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
                            <input type="text" name="tel" value="{{$company4->tel}}">
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
                            <input type="text" name="email" value="{{$company4->email}}">
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
                        <form action="/delete?id={{$company4->id}}" method="post" class="form_delete">
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
            const open_update_{{$company4->id}} = document.getElementById('open_update_{{$company4->id}}');
            const close_update_{{$company4->id}} = document.getElementById('update_close_btn_{{$company4->id}}');
            const modal2_{{$company4->id}} = document.getElementById('modal2_{{$company4->id}}');
            open_update_{{$company4->id}}.addEventListener('click', () => {
              modal2_{{$company4->id}}.style.display = 'block';
            })
            close_update_{{$company4->id}}.addEventListener('click', () => {
              modal2_{{$company4->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$company4->id}}") {
                modal2_{{$company4->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
        </table>
      </div>
      <!-- ステータス5 -->
      <div class="box5_table">
        <table class="tables_table">
          @foreach($companies5 as $company5)
          <tr>
            <td class="tables_maintd">
              <p id="open_update_{{$company5->id}}" class="open_update">
                {{$company5->company}}
              </p>
              <div id="modal2_{{$company5->id}}" class="modal2">
                <div class="modal__content2">
                  <div class="modal__content-inner2">
                    <input type="button" class="update_close" id="update_close_btn_{{$company5->id}}" value="×">
                    <form action="/update?id={{$company5->id}}" class="form_update" method="post">
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
                            <input type="text" name="company" value="{{$company5->company}}">
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
                            <input type="text" name="name" value="{{$company5->name}}">
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
                            <input type="text" name="tel" value="{{$company5->tel}}">
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
                            <input type="text" name="email" value="{{$company5->email}}">
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
                        <form action="/delete?id={{$company5->id}}" method="post" class="form_delete">
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
            const open_update_{{$company5->id}} = document.getElementById('open_update_{{$company5->id}}');
            const close_update_{{$company5->id}} = document.getElementById('update_close_btn_{{$company5->id}}');
            const modal2_{{$company5->id}} = document.getElementById('modal2_{{$company5->id}}');
            open_update_{{$company5->id}}.addEventListener('click', () => {
              modal2_{{$company5->id}}.style.display = 'block';
            })
            close_update_{{$company5->id}}.addEventListener('click', () => {
              modal2_{{$company5->id}}.style.display = 'none';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$company5->id}}") {
                modal2_{{$company5->id}}.style.display = 'none';
              }
            });
          </script>
          @endforeach
        </table>
      </div>
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

</html>