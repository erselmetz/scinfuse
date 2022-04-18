import { app, auth } from "./app.js";

export const home_area = () => {
    app.title('Scinfuse | Home');
    app.view('home',() => {
        auth.validate();
        app.navbar();
    })
};