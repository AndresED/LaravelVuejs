const API_URL = 'http://laravel5-vue2.dev:8888/users';

export default {
    resource(context) {
        return context.$resource(API_URL + '{/id}');
    }
}