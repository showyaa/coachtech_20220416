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
                <th></th>
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
              <tr>
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
              <tr>
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
    <div class="tables">
      <div class="box1"><p>{{$statuses[0]->status}}</p></div>
      <div class="box2"><p>{{$statuses[1]->status}}</p></div>
      <div class="box3"><p>{{$statuses[2]->status}}</p></div>
      <div class="box4"><p>{{$statuses[3]->status}}</p></div>
      <div class="box5"><p>{{$statuses[4]->status}}</p></div>
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
                    <form action="/update?id={{$company1->id}}" class="form_update" method="post">
                      @csrf
                      <table>
                        @error('company')
                        <tr>
                          <th></th>
                          <td>{{$message}}</td>
                        </tr>
                        @enderror
                        <tr>
                          <th>会社名</th>
                          <td>
                            <input type="text" name="company" value="{{$company1->company}}">
                          </td>
                        </tr>
                        @error('name')
                        <tr>
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
                        <tr>
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
                        <tr>
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
                      <input type="submit" class="update_btn" id="updateBtn" value="更新">
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <script>
            const open_update = document.getElementById('open_update_{{$company1->id}}');
            const modal2 = document.getElementById('modal2_{{$company1->id}}');
            open_update.addEventListener('click', () => {
              modal2.style.display = 'block';
            })
            window.addEventListener('click', (e) => {
              if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update_{{$company1->id}}") {
                modal2.style.display = 'none';
              }
            });
          </script>
          @endforeach
        </table>
      </div>
      <div class="box2_table">
        <table class="tables_table">
          @foreach($companies2 as $company2)
          <tr>
            <td class="tables_maintd">{{$company2->company}}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box3_table">
        <table class="tables_table">
          @foreach($companies3 as $company3)
          <tr>
            <td class="tables_maintd">{{$company3->company}}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box4_table">
        <table class="tables_table">
          @foreach($companies4 as $company4)
          <tr>
            <td class="tables_maintd">{{$company4->company}}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box5_table">
        <table class="tables_table">
          @foreach($companies5 as $company5)
          <tr>
            <td class="tables_maintd">{{$company5->company}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>



    <!-- <div id="modal2" class="modal2">
      <div class="modal__content2">
        <div class="modal__content-inner2">
          <form action="/update" class="form_update" method="post">
            @csrf
            <table>
              @error('company')
              <tr>
                <th></th>
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
              <tr>
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
              <tr>
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
            <input type="submit" class="update_btn" id="updateBtn" value="更新">
          </form>
        </div>
      </div>
    </div> -->
  </main>
  <script src="/js/main.js"></script>
</body>

</html>