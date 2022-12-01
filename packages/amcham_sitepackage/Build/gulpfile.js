// Gulp 4 gulpfile

const autoprefixer = require('gulp-autoprefixer'),
    browserSync = require('browser-sync'),
    concat = require('gulp-concat'),
    connect = require('gulp-connect-php'),
    gulp = require('gulp'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    stripCssComments = require('gulp-strip-css-comments'),
    uglify = require('gulp-uglify'),
    watch = require('gulp-watch');

/* ------------------------------------
Process CSS
------------------------------------ */
gulp.task('processCss', done => {
    return gulp.src([
        'Scss/main.scss',
    ])
    // For production
        .pipe(sass({outputStyle: 'nested'}).on('error', sass.logError))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 versions'],
            cascade: false
        }))
        .pipe(rename('prod.main.css'))
        .pipe(gulp.dest('Templates/Prod'))

        // For distribution
        .pipe(sass({outputStyle: 'nested'}).on('error', sass.logError))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 versions'],
            cascade: false
        }))
        .pipe(rename('dist.main.min.css'))
        .pipe(stripCssComments({preserve: false}))
        .pipe(gulp.dest('../Resources/Public/Dist'));

    done();
});

/* ------------------------------------
Process JS
------------------------------------ */
gulp.task('processJs', done => {
    return gulp.src([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        'node_modules/slick-carousel/slick/slick.js',
        // 'node_modules/orejime/dist/orejime.js',
        // 'Js/OrejimeConfig.js',
        // 'Js/jquery.cookie.js',
        'Js/forms.js',
        'Js/functions.js',
        'Js/main.js'
    ])
    // For production
        .pipe(concat('prod.main.js'))
        .pipe(gulp.dest('Templates/Prod'))
        // For distribution
        .pipe(rename('dist.main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../Resources/Public/Dist'));

    done();
});

/* ------------------------------------
Copy assets
------------------------------------ */
gulp.task('copyFonts', done => {
    gulp.src([
        'Templates/Fonts/**/*.eot',
        'Templates/Fonts/**/*.svg',
        'Templates/Fonts/**/*.ttf',
        'Templates/Fonts/**/*.woff',
        'Templates/Fonts/**/*.woff2'
    ])

    // copy for dist
        .pipe(gulp.dest('../Resources/Public/Fonts'))
    done();
});

gulp.task('copyImages', done => {
    gulp.src('Templates/Img/**/*')
        .pipe(gulp.dest('../Resources/Public/Img'))
    done();
});

gulp.task('copyFavicon', done => {
    gulp.src('Templates/Favicon/**/*')
        .pipe(gulp.dest('../Resources/Public/Favicon'))
    done();
});

/* ------------------------------------
Serve and watch
------------------------------------ */
gulp.task('default', gulp.series('processCss', 'processJs', 'copyFonts', 'copyImages', 'copyFavicon', (done) => {
    connect.server({
        // base: './Templates/00_frontpage.php'
    }, function () {
        browserSync({
            proxy: '127.0.0.1:8000'
        });
    });

    gulp.watch('Scss/**/*.scss').on('change', gulp.series('processCss', function () {
        browserSync.reload();
    }));
    gulp.watch('Js/**/*.js').on('change', gulp.series('processJs', function () {
        browserSync.reload();
    }));
    gulp.watch('Templates/**/*.php').on('change', gulp.series(function () {
        browserSync.reload();
    }));
    done();
}));


/* ------------------------------------
Watch only
------------------------------------ */
gulp.task('watch', gulp.series('processCss', 'processJs', 'copyFonts', 'copyImages', 'copyFavicon', (done) => {
    gulp.watch('Scss/**/*.scss').on('change', gulp.series('processCss'));
    gulp.watch('Js/**/*.js').on('change', gulp.series('processJs'));
    done();
}));
