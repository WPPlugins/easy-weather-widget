module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    './css/style.min.css': ['./css/style.css']
                }
            }
        },

        sass: {

            options: {
                loadPath: [
                    'sass'

                ]
            },
            production: {
                options: {
                    style: 'expanded',
                    sourcemap: 'auto',
                    precision: 4
                },
                files: {
                    'css/style.css': 'sass/main.scss'
                }
            }
        },


        watch: {

            sass: {
                files: [
                    'sass/*.scss',
                    'sass/**/*.scss'
                ],
                tasks: ['default']
            },
            composer: {
                "files": "composer.json",
                "tasks": ["composer:update"]
            }

        },
        bower: {
            install: {
                options: {
                    targetDir: './external'
                }
            }
        },
        copy: {
            main: {
                files: [
                    // includes files within path
                    {expand: true, src: ['./css/*.min*.css'], dest: './dist/'},
                    {expand: true, src: ['./eww/**'], dest: './dist/'},
                    {expand: true, src: ['./external/**'], dest: './dist/'},
                    {expand: true, src: ['./external/**'], dest: './dist/'},
                    {expand: true, src: ['./languages/**'], dest: './dist/'},
                    {expand: true, src: ['./vendor/**'], dest: './dist/'},
                    {expand: true, src: ['./views/**'], dest: './dist/'},
                    {expand: true, src: ['./*.php'], dest: './dist/'},
                    {expand: true, src: ['./readme.txt'], dest: './dist/'}
                ]
            }
        },
        clean: ['./dist']


    });


    grunt.loadNpmTasks("grunt-sass");
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-composer');
    grunt.loadNpmTasks('grunt-bower-installer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-dist');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.registerTask('default', ['composer:install', 'composer:dump-autoload -o', 'bower:install', 'sass:production', 'cssmin']);



};