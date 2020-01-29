<?php
// a->b    a객체or메서드 안의 b 실행(호출) 이란뜻,바인딩(관계를 체인), *'무엇안에 있는' 이라는 뜻으로 해석하면 편함
// a::b    a클래스 안의 b메소드 실행(호출)이란뜻,정적메소드에서 사용,정적메소드는 클래스의 인스턴스 없이 호출가능,인스턴스에서 호출불가능
// a=>b    배열에 사용, a가 b에 상응하는 값을 가짐
//$this란 객체(class)를 가리킴  
//namespace 개별 클래스가 속한 위치를 운영체제의 디렉터리처럼 구분하여 같은 이름을 가진 클래스를 여러개 사용할수있게 하는것
//use      다른 namespace를 가져오는 명령어 ex) use App\Models\File; 이렇게 쓰면 네임클래스 접두사 없이도 File 클래스를 사용할수 있다
//use App\Models\File; 는 $file = new App\Models\File(); 과 같음
//migration 데이터베이스에 table을 만드는것
//model,엘로퀀트   데이터베이스와 연결할때 필요,데이터베이스의 데이터를 객체로 표현하기위한 변환,객체에 저장된 데이터를 데이터베이스 시스템에 저장하기 위한것
//foreach($articles as $item)  $articles 의 개수만큼 변수 실행, $article 배열    $item 사용할 변수($item 변수에 배열값이 순서대로 들어간다)
//엘로퀀트 모델을 배열로 할당할때 toArray()를 씀
//외부 컴포넌트에서 제공하는 뷰를 반환할때도 패키지이름::뷰이름 이라고 쓴다
//라라벨6는 app\Exceptions\Handler가 아니라  C:\Users\whgns\myapp\app\Http\Middleware\Authenticate에서 인증되지 않은 사용자를 보냄
// migration 데이터 베이스 연결 오류가 날때는 php artisan config:clear 명령어를 쓰자
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');


/*사용자 가입*/ 
Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@create'
]);


Route::post('auth/register', [
    'as' => 'users.store',
    'uses' => 'UsersController@store'
]);

/**where메소드 안에 있는것은 유니코드로 URL의 code부분의 값을 특정 값들로만 들어오게 제한할수있다 */
Route::get('auth/confirm/{code}', [
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm'
])->where('code', '[\pL\pN]{60}');

/*사용자 인증*/
Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create'
]);

Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store'
]);

Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy'
]);

/*비밀번호 초기화*/
Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind'
]);

Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind'
]);

Route::get('auth/reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset'
])->where('token','[\pL\pN]{64}');

Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset'
]);

//글 생성,수정,삭제
Route::resource('articles', 'ArticlesController');
Route::get('articles/delete/{id}', [
    'as' => 'articles.delete',
    'uses' =>'ArticlesController@delete',
]);
//댓글 생성, 수정, 삭제
Route::resource('comments', 'CommentsController',['only'=>['update','destroy','edit']]);
Route::resource('articles.comments', 'CommentsController', ['only' => 'store']);

//tag
Route::get('tags/{slug}/articles',[
    'as' => 'tags.articles.index',
    'uses' => 'ArticlesController@index'
]);
//file
Route::resource('files', 'AttachmentsController', ['only' => ['store', 'destroy']]);

Route::get('mail', function () {
 $article = App\Article::with('user')->find(1);
 
 return Mail::send(
     [ 'text' =>'emails.articles.created-text'],
     compact('article'),
     function ($message) use ($article) {
         $message->from('whgnsrl1210@gmail.com','jojo');
         $message->to('whgnsrl1210@gmail.com');
         $message->subject('새글이 등록되었습니다.' . $article->title);
         $message->cc('whgnsrl1210@gmail.com');
         $message->attach(storage_path('elephant'));
     }
 );
});

/*
Route::get('markdown', function () {
    $text =<<<EOT
    #마크 다운 예제 1

    이 문서는 [마크다운] [1]로 썻습니다. 화면에는 HTML로 변환되어 출력합니다.

    ##순서없는 목록

    -첫 번째 항목
    -두 번째 항목[^1]

    [1]: http://daringfireball.net/projects/markdown

    [^1]: 두 번째 항목_ http://google.com
    EOT;

    return app(ParsedownExtra::class)->text($text);
    
});


Route::get('docs/{file?}', function ($file = null) {
    $text = (new App\Documentation)->get($file);

    return app(ParsedownExtra::class)->text($text);
    
});


Route::get('docs/{file?}', 'DocsController@show');

//Route::get('docs/images/{image}', 'DocsController@image')->where('image' ,'[\pL-pN\._-]+-img-[0-9]{2}.png');

*/