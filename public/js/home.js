import { app, auth } from "./app.js";

export const home_area = () => {
    auth.validate();
    app.title('Scinfuse | Home');
    app.navbar();
    app.chats_button();
    app.view('home',() => {

    })
};