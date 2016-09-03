'use strict';

exports.config = {
    paths: {
        'public': 'web',
        'watched': ['src/resources']
    },
    conventions: {
        'assets': /^src\/resources\/assets/
    },
    files: {
        javascripts: {
            joinTo: {
                'js/app.js': /^src/,
            }
        },
        stylesheets: {
            joinTo: 'css/style.css'
        }
    },
    plugins: {
        imageoptimizer: {
            smushit: true,
            path: "src/resources/assets/img/"
        }
    }
};