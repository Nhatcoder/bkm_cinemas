/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
import { route } from 'ziggy-js';
import $ from "jquery";
import Alpine from "alpinejs";
import * as utils from "@/utils/common";
import Services from "./services";
import moment from "moment";
import "./moment.vi";
import Echo from "laravel-echo";
import './components';
import { echo } from "./echo/Echo";
moment.locale("vi");

// thư viện
window.axios = axios;
window.route = route;
window.Alpine = Alpine;

// custom
window.utils = utils;
window.Services = Services;



Alpine.start();


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

window.echo = echo