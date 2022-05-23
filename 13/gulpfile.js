const gulp = require('gulp');
const browserSync = require('browser-sync');

const sass = require("gulp-sass");
const plumber = require('gulp-plumber'); //エラー時の強制終了を防止
const notify = require('gulp-notify'); //エラー発生時にデスクトップ通知する
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const prettify = require('gulp-prettify');
const reload = browserSync.reload;

// HTML整形
function html() {
    return gulp
      .src('**/*.{html,php}', { since: gulp.lastRun(html) })
      .pipe(
        prettify({
          indent_char: ' ',
          indent_size: 2,
          unformatted: ['a', 'span', 'br'],
        }),
      )
      .pipe(gulp.dest('./'));
}

function styles(){
    // style.scssファイルを取得
    return gulp
        .src("sass/**/*.scss")
        // Sassのコンパイルを実行
        .pipe(
            plumber({
                errorHandler: notify.onError('<%= error.message %>'),
            }),
        )
        .pipe(sourcemaps.init())
        .pipe(sass({
            // outputStyle: "expanded"
            outputStyle: "compressed"
        }))
        .on('error', function(err){
            console.error('Error!', err.message);
        })
        .pipe(sourcemaps.write("../map/"))
        // .pipe(replace(/@charset "UTF-8";/g, ''))
        // .pipe(header('@charset "UTF-8";\n\n'))
        // cssフォルダー以下に保存
        .pipe(gulp.dest("css/"));
}

function scripts(){
    return gulp.src('babel/*.js')
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(gulp.dest('js'));
}

// ブラウザ更新&ウォッチタスク
const browserSyncOption = {
    port: 8080,
    proxy: {
        target: "test.toureikai.jp"
        //   target: "test.kawakamishoji1964.co.jp"
    },
    reloadOnRestart: true,
};

function browsersync(done) {
    browserSync.init(browserSyncOption);
    done();
}

function watchFiles(done) {
    const browserReload = () => {
        //   browserSync.reload();
        reload();
        done();
    };
    gulp.watch('sass/**/*.scss').on('change', gulp.series(styles, browserReload));
    gulp.watch('babel/**/*.js').on('change', gulp.series(scripts, browserReload));
    gulp.watch('*.{html,php}').on('change', gulp.series(browserReload));
}

// gulp.task('default', function(){
//     // gulp.watch('sass/**/*.scss', ['sass']);
//     gulp.watch('**/*.{html,php}').on('change', reload);
// });

// gulp.task('default', gulp.series(styles, browsersync));
gulp.task('default', gulp.series(gulp.parallel(scripts, styles), gulp.series(browsersync, watchFiles)));
// gulp.task('default', gulp.series(browsersync));
