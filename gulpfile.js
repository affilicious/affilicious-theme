var gulp = require('gulp'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    uglifycss = require('gulp-uglifycss'),
    rename = require('gulp-rename'),
    es6 = require('gulp-babel'),
    imageMin = require('gulp-imagemin'),
    order = require('gulp-order'),
    sass = require('gulp-sass'),
    less = require('gulp-less'),
    merge = require('merge-stream'),
    watch = require('gulp-watch');

var assetsPath = 'assets/',
    publicPath = assetsPath + 'public/',
    adminPath = assetsPath + 'admin/',
    customizerPath = assetsPath +  'customizer/'
    ;

var assetPaths = {
    public: {
        css: [
            'assets/vendor/font-awesome/css/**',
            'assets/vendor/bootflat/css/**',
            'assets/vendor/slick/css/**'
        ],
        sass: [
            'assets/vendor/bootstrap-4/scss/bootstrap-flex-grid.scss',
            'assets/public/scss/**'
        ],
        less: [
            'assets/vendor/bootstrap-3/less/bootstrap.less'
        ],
        js: [
            'assets/vendor/jquery/js/**',
            'assets/vendor/retina/js/**',
            'assets/vendor/bootstrap-3/js/affix.js',
            'assets/vendor/bootstrap-3/js/alert.js',
            'assets/vendor/bootstrap-3/js/button.js',
            'assets/vendor/bootstrap-3/js/carousel.js',
            'assets/vendor/bootstrap-3/js/collapse.js',
            'assets/vendor/bootstrap-3/js/dropdown.js',
            'assets/vendor/bootstrap-3/js/modal.js',
            'assets/vendor/bootstrap-3/js/tooltip.js',
            'assets/vendor/bootstrap-3/js/popover.js',
            'assets/vendor/bootstrap-3/js/scrollspy.js',
            'assets/vendor/bootstrap-3/js/tab.js',
            'assets/vendor/bootstrap-3/js/transition.js',
            'assets/vendor/icheck/js/**'
        ],
        es6: [
            'assets/public/es6/**'
        ],
        fonts: [
            'assets/vendor/font-awesome/fonts/**',
            'assets/vendor/bootstrap-3/fonts/**',
        ],
        images: []
    },

    admin: {
        css: [],
        sass: [
            'assets/admin/scss/**'
        ],
        less: [],
        js: [],
        es6: [
            'assets/admin/es6/**'
        ],
        fonts: [],
        images: []
    },

    customizer: {
        css: [],
        sass: [],
        less: [],
        js: [],
        es6: [
            'assets/customizer/es6/**'
        ],
        fonts: [],
        images: []
    },
};

gulp.task('public-css', function() {
    var cssStream = gulp.src(assetPaths.public.css)
            .pipe(concat('css-files.css'))
        ;

    var lessStream = gulp.src(assetPaths.public.less)
            .pipe(less())
            .pipe(concat('less-files.less'))
        ;

    var sassStream = gulp.src(assetPaths.public.sass)
            .pipe(sass())
            .pipe(concat('sass-files.scss'))
        ;

    return merge(cssStream, sassStream, lessStream)
        .pipe(order(['css-files.css', 'less-files.less', 'sass-files.scss']))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(publicPath + 'css/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglifycss())
        .pipe(gulp.dest(publicPath + 'css/'))
        ;
});

gulp.task('admin-css', function() {
    var cssStream = gulp.src(assetPaths.admin.css)
            .pipe(concat('css-files.css'))
        ;

    var lessStream = gulp.src(assetPaths.admin.less)
            .pipe(less())
            .pipe(concat('less-files.less'))
        ;

    var sassStream = gulp.src(assetPaths.admin.sass)
            .pipe(sass())
            .pipe(concat('sass-files.scss'))
        ;

    return merge(cssStream, sassStream, lessStream)
        .pipe(order(['css-files.css', 'less-files.less', 'sass-files.scss']))
        .pipe(concat('admin.css'))
        .pipe(gulp.dest(adminPath + 'css/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglifycss())
        .pipe(gulp.dest(adminPath + 'css/'))
        ;
});

gulp.task('public-js', function () {
    var jsStream = gulp.src(assetPaths.public.js)
            .pipe(concat('js-files.js'))
        ;

    var es6Stream = gulp.src(assetPaths.public.es6)
            .pipe(es6())
            .pipe(concat('es6-files.js'))
        ;

    return merge(jsStream, es6Stream)
        .pipe(order(['js-files.js', 'es6-files.js']))
        .pipe(concat('script.js'))
        .pipe(gulp.dest(publicPath + 'js/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest(publicPath + 'js/'))
        ;
});

gulp.task('admin-js', function () {
    var jsStream = gulp.src(assetPaths.admin.js)
            .pipe(concat('js-files.js'))
        ;

    var es6Stream = gulp.src(assetPaths.admin.es6)
            .pipe(es6())
            .pipe(concat('es6-files.js'))
        ;

    return merge(jsStream, es6Stream)
        .pipe(order(['js-files.js', 'es6-files.js']))
        .pipe(concat('admin.js'))
        .pipe(gulp.dest(adminPath + 'js/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest(adminPath + 'js/'))
        ;
});

gulp.task('customizer-js', function () {
    var jsStream = gulp.src(assetPaths.customizer.js)
            .pipe(concat('js-files.js'))
        ;

    var es6Stream = gulp.src(assetPaths.customizer.es6)
            .pipe(es6())
            .pipe(concat('es6-files.js'))
        ;

    return merge(jsStream, es6Stream)
        .pipe(order(['js-files.js', 'es6-files.js']))
        .pipe(concat('customizer.js'))
        .pipe(gulp.dest(customizerPath + 'js/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest(customizerPath + 'js/'))
        ;
});

gulp.task('public-images', function() {
    return gulp.src(assetPaths.public.images)
        .pipe(imageMin())
        .pipe(gulp.dest(publicPath + 'images/'))
        ;
});

gulp.task('admin-images', function() {
    return gulp.src(assetPaths.admin.images)
        .pipe(imageMin())
        .pipe(gulp.dest(adminPath + 'images/'))
        ;
});

gulp.task('public-fonts', function() {
    return gulp.src(assetPaths.public.fonts)
        .pipe(gulp.dest(publicPath + 'fonts/'))
        ;
});

gulp.task('admin-fonts', function() {
    return gulp.src(assetPaths.admin.fonts)
        .pipe(gulp.dest(adminPath + 'fonts/'))
        ;
});

gulp.task('public-watch', function() {
    gulp.watch(assetPaths.public.css, ['public-css']);
    gulp.watch(assetPaths.public.less, ['public-css']);
    gulp.watch(assetPaths.public.sass, ['public-css']);
    gulp.watch(assetPaths.public.js, ['public-js']);
    gulp.watch(assetPaths.public.es6, ['public-js']);
    gulp.watch(assetPaths.public.images, ['public-images']);
    gulp.watch(assetPaths.public.fonts, ['public-fonts']);
});

gulp.task('admin-watch', function() {
    gulp.watch(assetPaths.admin.css, ['admin-css']);
    gulp.watch(assetPaths.admin.less, ['admin-css']);
    gulp.watch(assetPaths.admin.sass, ['admin-css']);
    gulp.watch(assetPaths.admin.js, ['admin-js']);
    gulp.watch(assetPaths.admin.es6, ['admin-js']);
    gulp.watch(assetPaths.admin.images, ['admin-images']);
    gulp.watch(assetPaths.admin.fonts, ['admin-fonts']);
});

gulp.task('default', ['public-css', 'public-js', 'public-images', 'public-fonts', 'admin-css', 'admin-js', 'admin-images', 'admin-fonts', 'customizer-js']);
gulp.task('watch', ['default', 'public-watch', 'admin-watch']);
