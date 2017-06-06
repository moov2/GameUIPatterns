module.exports = function(grunt) {

    //configure tasks
    grunt.initConfig ({
        pkg: grunt.file.readJSON('package.json'),

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'styles/',
                    src: ['*.css', '!*.min.css'],
                    dest: '.',
                    ext: '.min.css'
                }]
            }
        },

        watch: {
            scripts: {
                files: ['**/*.scss'],
                tasks: ['compile'],
                options: {
                    spawn: false,
                },
            },
        },

        sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'styles/style.css': 'styles/main.scss'  // 'destination': 'source'
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['last 8 versions']
            },
            dist: {
                files: {
                    'style-release.css': 'styles/style.css',
                    'admin--login-release.css': 'styles/admin--login.css'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('compile',['sass','autoprefixer','cssmin','watch']);
}
