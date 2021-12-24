<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    @auth
      <title>{{ Auth::user()->username }}</title>
    @else
      <title>Nitcrete</title>
    @endauth

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="/css/heroes.css" rel="stylesheet">

  </head>
  <body> 
  
    @auth
      <!-- Header -->
      <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/home" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/home" class="nav-link px-2 text-white">Nitcrete</a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            </form>

            <div class="text-end">
              <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->username }}
                </button>
                <ul class="dropdown-menu">
                  @if(Auth::user()->username == "Aldilan")
                    <li><a class="dropdown-item" href="/webcontrol">Control web</a></li>
                  @endif
                  <li><a class="dropdown-item" href="/sendmsg">Send message</a></li>
                  @foreach($users as $account)
                    <li><a class="dropdown-item" href="{{ route('account.edit' ,$account->id) }}">Change password</a></li>
                  @endforeach
                  <li><hr class="dropdown-divider"></li>
                  <form action="/logout" method="post">
                    @csrf
                    <li><button type="submit" class="dropdown-item btn btn-secondary">Logout</button></li>
                  </form>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main home -->
      <main>
        <div></div>
          <div class="px-4 pt-5 my-5 border-bottom">
              <div class="text-center">
              @if(session()->has('loginscs'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('loginscs') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('regisscs'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('regisscs') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                  <h1 class="display-4 fw-bold">{{ Auth::user()->username }}'s Inbox</h1>
              </div>
              <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4">The messages below may be sent from people you know or don't know, so please don't take it seriously, as this is just to cheer you up.</p>
              </div>
              @if($msg == 'You have message')
                @foreach($messages as $message)
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4 ms-2">{{ $message->message }}</p>
                        <small><p class="text-end fw-light">{{ $message->created_at }}</p></small>
                    </div>
                    <!-- <div class="ms-3">
                        <small>The replies</small>
                    </div>
                    <div class="ms-4">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid tenetur magnam voluptates deserunt, doloribus qui inventore excepturi aliquam voluptas sunt, maxime enim voluptatibus mollitia! Sint iusto assumenda ut, voluptatem quis consequuntur? Dolores quod architecto, repudiandae eveniet laboriosam corporis quis, dolore, molestiae assumenda voluptate iusto? Laboriosam esse cumque doloremque a maiores quas necessitatibus! Velit provident optio accusamus aspernatur sint ipsum, esse magnam voluptatem repellendus placeat veritatis voluptates facilis atque repudiandae unde molestiae at animi eum delectus nisi a laudantium eveniet perspiciatis. Vero, natus assumenda!
                    </div>
                    <div class="input-group input-group-sm mb-3 px-4">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class = "ps-4">
                        <button type="submit" class="btn btn-outline-dark">Send</button>
                    </div> -->
                </div>
                @endforeach
              @else
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4 ms-2">{{ $msg }}</p>
                    </div>
                    <!-- <div class="ms-3">
                        <small>The replies</small>
                    </div>
                    <div class="ms-4">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid tenetur magnam voluptates deserunt, doloribus qui inventore excepturi aliquam voluptas sunt, maxime enim voluptatibus mollitia! Sint iusto assumenda ut, voluptatem quis consequuntur? Dolores quod architecto, repudiandae eveniet laboriosam corporis quis, dolore, molestiae assumenda voluptate iusto? Laboriosam esse cumque doloremque a maiores quas necessitatibus! Velit provident optio accusamus aspernatur sint ipsum, esse magnam voluptatem repellendus placeat veritatis voluptates facilis atque repudiandae unde molestiae at animi eum delectus nisi a laudantium eveniet perspiciatis. Vero, natus assumenda!
                    </div>
                    <div class="input-group input-group-sm mb-3 px-4">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class = "ps-4">
                        <button type="submit" class="btn btn-outline-dark">Send</button>
                    </div> -->
                </div>
              @endif
          </div>
      </main>
    @else
      <!-- Header -->
      <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/" class="nav-link px-2 text-white">Nitcrete</a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
              <li><a href="#" class="nav-link px-2 text-white btn disabled"></a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            </form>

            <div class="text-end">
              <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/sendmsg">Send message</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <form action="/logout" method="post">
                    @csrf
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  </form>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
      
      <!-- Main home -->
      <main>
          <div class="px-4 pt-5 my-5">
              <div class="text-center mb-5">
                  <h1 class="display-4 fw-bold">You haven't logged in yet</h1>
              </div>
              <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4 text-center">
                    Do you want to message now? <a class="text-decoration-none link-dark" href="/sendmsg">Here
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                    </a><br>
                    Or <br>
                    You want to login first? <a class="text-decoration-none link-dark" href="/login">Here
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                      </svg>
                    </a><br>
                  </p>
              </div>
              <div>
                
              </div>
          </div>
      </main>
    @endauth

    
    <!-- Bootstrap core JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

  </body>
</html>