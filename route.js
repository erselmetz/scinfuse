import { route } from "./public/js/app.js";
import { forgot_password_area } from "./public/js/auth/forgot_password.js";
import { login_area } from "./public/js/auth/login.js";
import { register_area } from "./public/js/auth/register.js";
import { home_area } from "./public/js/home.js";

route.get('/', home_area);
route.get('/home', home_area);
route.get('/login', login_area);
route.get('/register', register_area);
route.get('/forgot/password', forgot_password_area);
// route.get('/manage/account', manage_account_area);
// route.get('/chat/individual', _area);
// route.get('/chat/group', _area);
// route.get('/chat/global', _area);

route.execute();