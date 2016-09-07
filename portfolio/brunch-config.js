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
                'js/app.js': /^src/
            }
        },
        stylesheets: {
            joinTo: 'css/style.css',
            order: {
                after: [
                    'src/resources/css/custom.css'
                ]
            }
        }
    },
    plugins: {
        imageoptimizer: {
            smushit: true,
            path: "src/resources/assets/img/"
        }
    }
};
