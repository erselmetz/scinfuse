class App{
    server(params){
        return '/server/'+params;
    }
    array_from_localStorage(params){
        const a = localStorage.getItem(params);
        if(a != null){
            const b = JSON.parse(a);
            return b;
        }
    }
    view(params,callback){
        $('.main').load('/public/views/'+params+'.html',() => {
            callback();
        });
    }
    error(params){
        if(params == 404){
            const a = /*html */`
            <div class="d-flex align-items-center justify-content-center vh-100 vw-100">
                <div class="card col-10 col-md-5"style="background-color: rgba(0,0,0,0.5);">
                    <div class="card-body">
                        <h4 class="text-white fst-italic fw-bold">Error: 404</h4>
                        <p class="card-text text-white fst-italic">Not Found</p>
                    </div>
                </div>
            </div>
            `;
            $('.main').html(a);
        }
    }
    chats_button(){
        const body = $('body');
        body.append(/*html */`
        <div class="chat">
            <img src="/public/image/Chat icon.png" />
            <div class="chat-content">
                <a href="/chat/individual">Individual</a>
                <a href="/chat/group">Group</a>
                <a href="/chat/global">Global</a>
            </div>
        </div>`);
    }
}

class Auth{
    constructor(){

    }
    info(){
        return app.array_from_localStorage('auth');
    }
    validate(){
        $.ajax({
            type: "POST",
            url: app.server("auth.php"),
            data: {
                check_auth: true,
                auth: JSON.stringify(this.info())
            },
            beforeSend:function(){
                $('.main').hide();
            },
            success: function (response) {
                const res = JSON.parse(response);
    
                if(res.status == false){
                    window.location.href = '/login';
                }else{
                    $('.main').show();
                }
            }
        });
    }
    logout(){
        $.ajax({
            type: "POST",
            url: "/server/auth/logout.php",
            data: {
                logout: true
            },
            success: function (response) {
                const res = JSON.parse(response);
                if( res.logout = true ){
                    localStorage.removeItem('auth');
                    window.location.href = '/login';
                }
            }
        });
    }
}

class Route{
    constructor(){
        this.routes = [];
        this.url_string = window.location.href;
        this.url = new URL(this.url_string);
    }
    get(params,callback){
        this.routes[params] = callback;
    }
    execute(){
        if ( this.routes.hasOwnProperty(this.url.pathname) ) {
            this.routes[this.url.pathname]();
        }else{
            app.error(404);
        }
    }
}

// exporting area
export const auth = new Auth;
export const route = new Route;
export const app = new App;