import { app, route } from "./public/js/app.js";
import { forgot_password_area } from "./public/js/auth/forgot_password.js";
import { login_area } from "./public/js/auth/login.js";
import { register_area } from "./public/js/auth/register.js";
import { chat_global_area } from "./public/js/chat/global.js";
import { chat_group_area } from "./public/js/chat/group.js";
import { chat_individual_area } from "./public/js/chat/individual.js";
import { home_area } from "./public/js/home.js";
import { manage_account_area } from "./public/js/manage_account.js";

route.get('/', home_area);
route.get('/login', login_area);
route.get('/register', register_area);
route.get('/forgot/password', forgot_password_area);

route.get('/home', home_area);
route.get('/manage/account', manage_account_area);
route.get('/chat/individual', chat_individual_area);
route.get('/chat/group', chat_group_area);
route.get('/chat/global', chat_global_area);

route.execute();