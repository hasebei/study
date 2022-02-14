// ページの読み込みを待つ
window.addEventListener('load', init);

var renderer;

// サイズを指定
var width = 1200;
var height = 600;

var centerX = 600;
var centerY = 300;

var geo_arr = [];

var can;
var ctx;

var num_line = 80;
var start_line_arr = [];
var end_line_arr = [];

var geo_type_arr = [4, 8, 20, 20];

var group00;
var group01;
var group02;
var group03;
var group04;
var group05;
var group06;
var group07;

var photo01;
var photo02;
var photo03;
var photo04;
var photo05;
var photo06;
var photo07;
var photo08;
var photo09;
var photo10;
var photo11;
var photo12;
var photo13;
var photo14;
var photo15;
var photo16;
var photo17;
var photo18;
var photo19;
var photo20;
var photo21;



var photo01Info = {position:{x:-500, y:-200, z:-1000}, rotation:{x:-.1, y:.2, z:.1} };
var photo02Info = {position:{x:600, y:-500, z:-1600}, rotation:{x:-.1, y:-.2, z:-.1} };
var photo03Info = {position:{x:600, y:400, z:-1300}, rotation:{x:.2, y:-.2, z:.1} };
var photo04Info = {position:{x:-600, y:100, z:-1000}, rotation:{x:.1, y:.2, z:-.1} };
var photo05Info = {position:{x:550, y:-250, z:-900}, rotation:{x:-.1, y:-.2, z:-.2} };
var photo06Info = {position:{x:800, y:400, z:-1500}, rotation:{x:.2, y:-.1, z:.1} };
var photo07Info = {position:{x:-700, y:-0, z:-900}, rotation:{x:-.1, y:.2, z:.1} };
var photo08Info = {position:{x:800, y:-500, z:-1600}, rotation:{x:-.1, y:-.2, z:-.1} };
var photo09Info = {position:{x:600, y:300, z:-1300}, rotation:{x:.2, y:-.2, z:.1} };
var photo10Info = {position:{x:-700, y:100, z:-1100}, rotation:{x:.1, y:.2, z:-.1} };
var photo11Info = {position:{x:600, y:-300, z:-900}, rotation:{x:-.1, y:-.2, z:-.2} };
var photo12Info = {position:{x:800, y:500, z:-1600}, rotation:{x:.2, y:-.1, z:.1} };
var photo13Info = {position:{x:-500, y:-200, z:-1000}, rotation:{x:-.1, y:.2, z:.1} };
var photo14Info = {position:{x:1200, y:-400, z:-1600}, rotation:{x:-.1, y:-.2, z:-.1} };
var photo15Info = {position:{x:600, y:400, z:-1300}, rotation:{x:.2, y:-.2, z:.1} };
var photo16Info = {position:{x:-600, y:100, z:-1000}, rotation:{x:.1, y:.2, z:-.1} };
var photo17Info = {position:{x:550, y:-250, z:-900}, rotation:{x:-.1, y:-.2, z:-.2} };
var photo18Info = {position:{x:800, y:400, z:-1500}, rotation:{x:.2, y:-.1, z:.1} };
var photo19Info = {position:{x:-700, y:-200, z:-1000}, rotation:{x:-.1, y:.2, z:.1} };
var photo20Info = {position:{x:600, y:-500, z:-1600}, rotation:{x:-.1, y:-.2, z:-.1} };
var photo21Info = {position:{x:700, y:300, z:-1300}, rotation:{x:.2, y:-.2, z:.1} };



var group01Pos = {x:0, y:0, z:0};
var group02Pos = {x:2000, y:2000, z:-2000};
var group03Pos = {x:-1000, y:4000, z:-3000};
var group04Pos = {x:0, y:1000, z:-1000};
var group05Pos = {x:1000, y:-1000, z:-2000};
var group06Pos = {x:2000, y:1000, z:0};
var group07Pos = {x:0, y:3000, z:2000};

var sp_current = 0;









//青系
var geo_col_arr01 = [0x7ACAD6, 0xB9E1E5, 0xB1D1EF, 0xA2DBE3, 0x78C8D4, 0x9DD3C9, 0xCFE8E1, 0x879CD2, 0xAFB1D5, 0xAEC4D7, 0xC9DCEC, 0xC5DBE9, 0xD8E2E7];
//赤系
var geo_col_arr02 = [0xF28D78, 0xF6ABA1, 0xE69BB4, 0xE4748E, 0xD95780, 0xD03D6F, 0xE07896, 0xE07A98, 0xD95780, 0xB56DAC, 0xC86BA9];

function init() {


  /*****
  SP
  ******/

  setInterval(function(){
    sp_current++;
    if(sp_current >= 7)
    {
      sp_current = 0;
    }

    $('.mv_sp ul').css({'margin-left': - (sp_current * 100) + '%'});


  }, 5000);



/*
  can = document.getElementById("canvas_line");
  ctx = can.getContext("2d");
  can.height = height;

  for(var i = 0; i < num_line; i++)
  {
    for(var j = 0; j < 2; j++ )
    {
      var obj = {angle:Math.floor(Math.random() * 360), bector:Math.floor(Math.random() * 2), speed:Math.random() * 10 };
      if(j == 0)
      {
        start_line_arr.push(obj);
      }
      else
      {
        end_line_arr.push(obj);
      }
    }
  }
*/


  // レンダラーを作成
  renderer = new THREE.WebGLRenderer({
    canvas: document.querySelector('#canvas'),
    alpha: true
  });


  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(width, height);



 // Cameraを用意
    camera = new THREE.PerspectiveCamera();
    camera.aspect = width / height;
    camera.far = 5000;
    camera.updateProjectionMatrix();

    // Sceneを用意
    scene = new THREE.Scene();
    scene.add( camera );



    /************
    GROUP01
    ************/
    group01 = new THREE.Group();

    // 3D空間にグループを追加する
    scene.add(group01);

    //青系
    setPolyhedron(
      'blue',
      [{x:-950, y:300, z:-1000}, {x:-900, y:1000, z:-1800}, {x:-900, y:600, z:-2000}, {x:-600, y:-500, z:-2000}, {x:400, y:-100, z:-800}, {x:300, y:200, z:-400}],
      group01
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1500, y:-500, z:-1800}, {x:-400, y:400, z:-1200}, {x:100, y:600, z:-1400}, {x:400, y:700, z:-1300}, {x:200, y:-700, z:-1300}, {x:800, y:-200, z:-700}],
      group01
    );


    /* 1から3までのphotoを配置 */
      var material = getMaterial('images/1.png');
      // Cubeの用意
      var geometry = new THREE.PlaneGeometry(600, 400);
      eval('photo01' + ' = new THREE.Mesh( geometry, material )');
      addPhoto(eval('photo01'), eval('photo01' + 'Info'), group01);




    /************
    GROUP02
    ************/
    group02 = new THREE.Group();

    //青系
    setPolyhedron(
      'blue',
      [{x:-1150, y:100, z:-1000}, {x:-900, y:1000, z:-1800}, {x:-900, y:-200, z:-2000}, {x:-600, y:-300, z:-2000}, {x:600, y:100, z:-800}, {x:400, y:200, z:-400}],
      group02
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1500, y:-600, z:-1800}, {x:-600, y:600, z:-1200}, {x:100, y:400, z:-1400}, {x:400, y:700, z:-1300}, {x:200, y:-500, z:-1300}, {x:800, y:-200, z:-700}],
      group02
    );

    /* 4から6までのphotoを配置 */
    for(var i = 4; i <= 6; i++)
    {
      //photo
      // var material = getMaterial('assets/img/index/photo0' + i + '.jpg');
      // // Cubeの用意
      // var geometry = new THREE.PlaneGeometry(600, 400);
      // eval('photo0' + i + ' = new THREE.Mesh( geometry, material )');
      // addPhoto(eval('photo0' + i), eval('photo0' + i + 'Info'), group02);
    }



    /************
    GROUP03
    ************/
    group03 = new THREE.Group();

    //青系
    setPolyhedron(
      'blue',
      [{x:-1050, y:100, z:-1000}, {x:-700, y:1000, z:-1800}, {x:-1000, y:600, z:-2000}, {x:-600, y:-200, z:-2000}, {x:600, y:-100, z:-800}, {x:500, y:300, z:-400}],
      group03
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1500, y:-600, z:-1800}, {x:-600, y:400, z:-1200}, {x:100, y:400, z:-1400}, {x:500, y:700, z:-1300}, {x:200, y:-500, z:-1300}, {x:800, y:-200, z:-700}],
      group03
    );

    /* 7から9までのphotoを配置 */
    for(var i = 7; i <= 9; i++)
    {
      //photo
      // var material = getMaterial('assets/img/index/photo0' + i + '.jpg');
      // // Cubeの用意
      // var geometry = new THREE.PlaneGeometry(600, 400);
      // eval('photo0' + i + ' = new THREE.Mesh( geometry, material )');
      // addPhoto(eval('photo0' + i), eval('photo0' + i + 'Info'), group03);
    }



    /************
    GROUP04
    ************/
    group04 = new THREE.Group();

    //青系
    setPolyhedron(
      'blue',
      [{x:-1050, y:100, z:-1000}, {x:-1000, y:600, z:-1800}, {x:-1000, y:-600, z:-2000}, {x:-600, y:-100, z:-2000}, {x:700, y:100, z:-800}, {x:300, y:200, z:-400}],
      group04
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1500, y:-700, z:-1800}, {x:-600, y:400, z:-1200}, {x:200, y:500, z:-1400}, {x:600, y:600, z:-1300}, {x:200, y:-700, z:-1300}, {x:800, y:-200, z:-700}],
      group04
    );

    /* 10から12までのphotoを配置 */
    for(var i = 10; i <= 12; i++)
    {
      //photo
      // var material = getMaterial('assets/img/index/photo' + i + '.jpg');
      // // Cubeの用意
      // var geometry = new THREE.PlaneGeometry(600, 400);
      // eval('photo' + i + ' = new THREE.Mesh( geometry, material )');
      // addPhoto(eval('photo' + i), eval('photo' + i + 'Info'), group04);
    }


    /************
    GROUP05
    ************/
    group05 = new THREE.Group();

    //青系
    setPolyhedron(
      'blue',
      [{x:-1000, y:100, z:-1000}, {x:-900, y:700, z:-1800}, {x:-900, y:400, z:-2000}, {x:-500, y:-300, z:-2000}, {x:400, y:-200, z:-800}, {x:500, y:200, z:-400}],
      group05
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1500, y:-300, z:-1800}, {x:-500, y:500, z:-1200}, {x:100, y:500, z:-1400}, {x:600, y:500, z:-1300}, {x:200, y:-500, z:-1300}, {x:800, y:-200, z:-700}],
      group05
    );

    /* 13から15までのphotoを配置 */
    for(var i = 13; i <= 15; i++)
    {
      //photo
      // var material = getMaterial('assets/img/index/photo' + i + '.jpg');
      // // Cubeの用意
      // var geometry = new THREE.PlaneGeometry(600, 400);
      // eval('photo' + i + ' = new THREE.Mesh( geometry, material )');
      // addPhoto(eval('photo' + i), eval('photo' + i + 'Info'), group05);
    }




    /************
    GROUP06
    ************/
    group06 = new THREE.Group();

    //青系
    setPolyhedron(
      'blue',
      [{x:-1050, y:100, z:-1000}, {x:-1000, y:800, z:-1800}, {x:-1000, y:-400, z:-2000}, {x:-700, y:-300, z:-2000}, {x:400, y:100, z:-800}, {x:600, y:300, z:-600}],
      group06
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1600, y:-500, z:-1800}, {x:-400, y:400, z:-1200}, {x:100, y:400, z:-1400}, {x:400, y:500, z:-1300}, {x:200, y:-500, z:-1300}, {x:900, y:-200, z:-700}],
      group06
    );

    /* 10から12までのphotoを配置 */
    for(var i = 16; i <= 18; i++)
    {
      //photo
      // var material = getMaterial('assets/img/index/photo' + i + '.jpg');
      // // Cubeの用意
      // var geometry = new THREE.PlaneGeometry(600, 400);
      // eval('photo' + i + ' = new THREE.Mesh( geometry, material )');
      // addPhoto(eval('photo' + i), eval('photo' + i + 'Info'), group06);
    }



    /************
    GROUP07
    ************/
    group07 = new THREE.Group();

    //青系
    setPolyhedron(
      'blue',
      [{x:-1050, y:100, z:-1000}, {x:-1000, y:800, z:-1800}, {x:-900, y:400, z:-2000}, {x:-400, y:-300, z:-2000}, {x:400, y:-100, z:-800}, {x:400, y:300, z:-600}],
      group07
    );

    //赤系
    setPolyhedron(
      'red',
      [{x:-1600, y:-700, z:-1800}, {x:-700, y:400, z:-1200}, {x:100, y:400, z:-1400}, {x:700, y:500, z:-800}, {x:200, y:-300, z:-1300}, {x:900, y:-200, z:-700}],
      group07
    );

    /* 13から15までのphotoを配置 */
    for(var i = 19; i <= 21; i++)
    {
      //photo
      // switch(i){
      //   case 19:
      //     var material = getMaterial('assets/img/index/photo' + '19' + '.jpg');
      //     break;
      //   case 20:
      //     var material = getMaterial('assets/img/index/photo' + '07' + '.jpg');
      //     break;
      //   case 21:
      //     var material = getMaterial('assets/img/index/photo' + '13' + '.jpg');
      //     break;
      //   default:break;
      // }
      // Cubeの用意
      // var geometry = new THREE.PlaneGeometry(600, 400);
      // eval('photo' + i + ' = new THREE.Mesh( geometry, material )');
      // addPhoto(eval('photo' + i), eval('photo' + i + 'Info'), group07);
    }










/************
MOB
************/
    group00 = new THREE.Group();
    // 3D空間にグループを追加する
    scene.add(group00);

    //青系
    for(var i = 0; i < 15; i++)
    {



      var geo_type = geo_type_arr[Math.floor(Math.random() * 4)];
      switch(geo_type){
        case 4:
          var geometry = new THREE.TetrahedronGeometry( 40 );
          break;
        case 6:
          var geometry = new THREE.CubeGeometry( 40 );
          break;
        case 8:
          var geometry = new THREE.OctahedronGeometry( 40 );
          break;
        case 20:
          var geometry = new THREE.IcosahedronGeometry( 40 );
          break;
        default:break;
      }


      var mesh = new THREE.Mesh( setBlueCol(geometry, geo_type), new THREE.MeshBasicMaterial( { vertexColors: THREE.FaceColors } ) );


      var vertices = mesh.geometry.vertices;
      var originalVertices = getVertices(vertices);
      var randomVertices = getRandomVertices(originalVertices, 40);
      moveVertices(vertices, randomVertices);



      mesh.position.set( Math.random() * 8000 - 4000 , Math.random() * 8000 - 4000 , Math.random() * 4000 - 2000 - 2000);
      group00.add( mesh );
      geo_arr.push(mesh);
    }

    //赤系
    for(var i = 0; i < 15; i++)
    {

      var geo_type = geo_type_arr[Math.floor(Math.random() * 4)];
      switch(geo_type){
        case 4:
          var geometry = new THREE.TetrahedronGeometry( 40 );
          break;
        case 6:
          var geometry = new THREE.CubeGeometry( 40 );
          break;
        case 8:
          var geometry = new THREE.OctahedronGeometry( 40 );
          break;
        case 20:
          var geometry = new THREE.IcosahedronGeometry( 40 );
          break;
        default:break;
      }

      var mesh = new THREE.Mesh( setRedCol(geometry, geo_type), new THREE.MeshBasicMaterial( { vertexColors: THREE.FaceColors } ) );

      var vertices = mesh.geometry.vertices;
      var originalVertices = getVertices(vertices);
      var randomVertices = getRandomVertices(originalVertices, 40);
      moveVertices(vertices, randomVertices);

      mesh.position.set( Math.random() * 8000 - 4000 , Math.random() * 8000 - 4000 , Math.random() * 4000 - 2000 - 2000);
      group00.add( mesh );
      geo_arr.push(mesh);
    }















    camera.position.set(0, 0, 1000);
    animateCameraPos(0, 0, 0);



    setTimeout(function(){animation();}, 1000);
    resize_mv();
    run();

  // 毎フレーム時に実行されるループイベントです
  function run() {


    for(var i = 0; i < geo_arr.length; i++)
    {
      var mesh = geo_arr[i];
      if(i % 2 == 0)
      {
        mesh.rotation.x -= 0.0025;
        mesh.rotation.z -= 0.005;
      }
      else
      {
        mesh.rotation.x += 0.005;
        mesh.rotation.z += 0.0025;
      }
      if(i % 3 == 0)
      {
        mesh.rotation.y -= 0.005;
      }
      if(i % 4 == 0)
      {
        mesh.rotation.y += 0.0025;
      }
    }

    group01.position.z += .5;
    photo01.rotation.z += 0.0002;
    // photo02.rotation.x += 0.0005;
    // photo03.rotation.y += 0.0005;

    group02.position.z += .2;
    group02.position.x -= .2;
    group02.position.y -= .1;
    // photo04.rotation.z -= 0.0002;
    // photo05.rotation.x -= 0.0005;
    // photo06.rotation.y -= 0.0005;

    group03.position.z += .2;
    group03.position.x += .2;
    group03.position.y -= .1;
    // photo07.rotation.z += 0.0002;
    // photo08.rotation.x += 0.0005;
    // photo09.rotation.y += 0.0005;

    group04.position.z -= .2;
    group04.position.x -= .2;
    group04.position.y += .2;
    // photo10.rotation.z -= 0.0002;
    // photo11.rotation.x -= 0.0005;
    // photo12.rotation.y -= 0.0005;


    group05.position.z += .2;
    group05.position.x -= .2;
    group05.position.y += .2;
    // photo13.rotation.z += 0.0002;
    // photo14.rotation.x += 0.0005;
    // photo15.rotation.y += 0.0005;


    group06.position.z -= .2;
    group06.position.x -= .2;
    group06.position.y -= .1;
    // photo16.rotation.z -= 0.0002;
    // photo17.rotation.x -= 0.0005;
    // photo18.rotation.y -= 0.0005;

    group07.position.z -= .2;
    // photo19.rotation.z += 0.0002;
    // photo20.rotation.x += 0.0005;
    // photo21.rotation.y += 0.0005;






    // レンダリング
    renderer.render(scene, camera);

//    lineAnimation();

    requestAnimationFrame(run);
  }

}


function animation(){


  /**********
  01 ANIMATION
  **********/

  //行き
  setTimeout(function(){
    goText(1);
  }, 0);

  //帰り
  setTimeout(function(){
    backText(1);
  }, 4000);

  /**********
  02 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group02);
    resetGroup(2);
    resetPhotos(4);
    animateCameraPos(group02Pos.x, group02Pos.y, group02Pos.z);
  }, 4500);

  //行き
  setTimeout(function(){
    scene.remove(group01);
    goText(4);
  }, 6000);

  //帰り
  setTimeout(function(){
    backText(4);
  }, 10000);



  /**********
  03 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group03);
    resetGroup(3);
    resetPhotos(7);
    animateCameraPos(group03Pos.x, group03Pos.y, group03Pos.z);
  }, 10500);

  //行き
  setTimeout(function(){
    scene.remove(group02);
    goText(7);
  }, 12000);

  //帰り
  setTimeout(function(){
    backText(7);
  }, 16000);



  /**********
  04 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group04);
    resetGroup(4);
    resetPhotos(10);
    animateCameraPos(group04Pos.x, group04Pos.y, group04Pos.z);
  }, 16500);

  //行き
  setTimeout(function(){
    scene.remove(group03);
    goText(10);
  }, 18000);

  //帰り
  setTimeout(function(){
    backText(10);
  }, 22000);




  /**********
  05 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group05);
    resetGroup(5);
    resetPhotos(13);
    animateCameraPos(group05Pos.x, group05Pos.y, group05Pos.z);
  }, 22500);

  //行き
  setTimeout(function(){
    scene.remove(group04);
    goText(13);
  }, 24000);

  //帰り
  setTimeout(function(){
    backText(13);
  }, 28000);


  /**********
  06 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group06);
    resetGroup(6);
    resetPhotos(16);
    animateCameraPos(group06Pos.x, group06Pos.y, group06Pos.z);
  }, 28500);

  //行き
  setTimeout(function(){
    scene.remove(group05);
    goText(16);
  }, 30000);

  //帰り
  setTimeout(function(){
    backText(16);
  }, 34000);


  /**********
  07 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group07);
    resetGroup(7);
    resetPhotos(19);
    animateCameraPos(group07Pos.x, group07Pos.y, group07Pos.z);
  }, 34500);

 
   //行き
  setTimeout(function(){
    scene.remove(group06);
    $('.p19').addClass('show');
  }, 36000);


  //帰り
  setTimeout(function(){
    $('.p19').removeClass('show');
  }, 40000);



  /**********
  01 ANIMATION
  **********/

  setTimeout(function(){
    scene.add(group01);
    resetGroup(1);
    resetPhotos(1);
    animateCameraPos(group01Pos.x, group01Pos.y, group01Pos.z);
  }, 40500);

  //行き
  setTimeout(function(){
    scene.remove(group07);
    animation();
  }, 42000);

}



function goText(start_num)
{
  setTimeout(function(){
    $('.text_area p.p' + start_num).addClass('open');
  }, 0);

  setTimeout(function(){
    $('.text_area p.p' + start_num).addClass('close');
  }, 300);

  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 1, 10)).addClass('open');
  }, 100);
  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 1, 10)).addClass('close');
  }, 400);

  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 2, 10)).addClass('open');
  }, 200);
  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 2, 10)).addClass('close');
  }, 500);
}


function backText(start_num)
{
  //帰り
  setTimeout(function(){
    $('.text_area p.p' + start_num).removeClass('close');
    $('.text_area p.p' + start_num).addClass('open02');
  }, 0);
  setTimeout(function(){
    $('.text_area p.p' + start_num).addClass('end');
    $('.text_area p.p' + start_num).addClass('close02');
  }, 300);

  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 1, 10)).removeClass('close');
    $('.text_area p.p' + parseInt(start_num + 1, 10)).addClass('open02');
  }, 100);
  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 1, 10)).addClass('end');
    $('.text_area p.p' + parseInt(start_num + 1, 10)).addClass('close02');
  }, 400);

  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 2, 10)).removeClass('close');
    $('.text_area p.p' + parseInt(start_num + 2, 10)).addClass('open02');
  }, 200);
  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 2, 10)).addClass('end');
    $('.text_area p.p' + parseInt(start_num + 2, 10)).addClass('close02');
  }, 500);
  setTimeout(function(){
    $('.text_area p.p' + parseInt(start_num + 0, 10)).removeClass('open open02 close close02 end');
    $('.text_area p.p' + parseInt(start_num + 1, 10)).removeClass('open open02 close close02 end');
    $('.text_area p.p' + parseInt(start_num + 2, 10)).removeClass('open open02 close close02 end');
  }, 800);
}

function setBlueCol(geometry, geo_type){
  for(var i = 0; i < geo_type; i++)
  {
    geometry.faces[ i ].color.set( geo_col_arr01[Math.floor(Math.random() * geo_col_arr01.length)] );
  }
  return geometry;
}
function setRedCol(geometry, geo_type){
  for(var i = 0; i < geo_type; i++)
  {
    geometry.faces[ i ].color.set( geo_col_arr02[Math.floor(Math.random() * geo_col_arr02.length)] );
  }
  return geometry;
}




function animateCameraPos(x,y,z) {
  const that = this;
  const coords = this.camera.position; // 現在地点
  const destinationVector = new THREE.Vector3(x, y, z); // 終着地点
  const DURATION = 2000;
  let loop;

  const tween = new TWEEN.Tween(coords)
    .to(destinationVector, DURATION)
    .easing(TWEEN.Easing.Exponential.InOut) // 最後で減速する
//    .onUpdate(update) // TWEEN.update()の度に呼び出される
//    .onComplete(complete)
    .start();

  renderCamera();

  function renderCamera() {
    loop = requestAnimationFrame(renderCamera);
    TWEEN.update();
  }
  function update() {
    that.camera.lookAt(that.zeroVector); // 向きを変えながら移動
  }
  // 終着地点に着き次第、requestAnimationFrameをストップ
  function complete() {
    cancelAnimationFrame(loop);
  }
}
/*
function lineAnimation(){
  ctx.clearRect(0, 0, width, height);
  ctx.strokeStyle = '#E3E3E3';

  for(var i = 0; i < start_line_arr.length; i++ )
  {
    var obj = start_line_arr[i];
    if(obj.bector == 0)
    {
      obj.angle+=.0001 * obj.speed;
    }
    else
    {
      obj.angle-=.0001 * obj.speed;
    }

    if(obj.angle > 360){
      obj.angle = 0;
    }
    else if(obj.angle < 0){
      obj.angle = 360;
    }

    var start_angle = obj.angle;
    var x = centerX + Math.cos( start_angle ) * (width / 2 + 1000);
    var y = centerY + Math.sin( start_angle ) * (width / 2 + 1000);


    var obj = end_line_arr[i];
    if(obj.bector == 0)
    {
      obj.angle+=.0001 * obj.speed;
    }
    else
    {
      obj.angle-=.0001 * obj.speed;
    }

    if(obj.angle > 360){
      obj.angle = 0;
    }
    else if(obj.angle < 0){
      obj.angle = 360;
    }

    var end_angle = obj.angle;
    var x2 = centerX + Math.cos( end_angle ) * (width / 2 + 1000);
    var y2 = centerY + Math.sin( end_angle ) * (width / 2 + 1000);

    ctx.beginPath();
    ctx.moveTo(x, y);
    ctx.lineTo(x2, y2);
    ctx.stroke();
  }
}
*/



function getVertices(sourceVertices) {
  var vertices = [];
  var length = sourceVertices.length;
  for (var i = 0; i < length; i++) {
    var vertex = sourceVertices[i];
    vertices[i] = {x: vertex.x, y: vertex.y, z: vertex.z};
  }
  return vertices;
}

function getRandomVertices(vertices, range) {
  var randomVertices = [];
  var length = vertices.length;
  for (var i = 0; i < length; i++) {
    var vertex = vertices[i];
    var randomVertex = {x: vertex.x, y: vertex.y, z: vertex.z};
    randomVertex.x += -range / 2 + Math.random() * range;
    randomVertex.y += -range / 2 + Math.random() * range;
    randomVertex.z += -range / 2 + Math.random() * range;
    randomVertices[i] = randomVertex;
  }
  return randomVertices;
}

function moveVertices(vertices, newVertices) {
  var length = vertices.length;
  for (var i = 0; i < length; i++) {
    var vertex = vertices[i];
    var newVertex = newVertices[i];
    vertex.x = newVertex.x;
    vertex.y = newVertex.y;
    vertex.z = newVertex.z;
  }
}

function addPhoto(mesh, info, group)
{
  group.add( mesh );
  resetPhoto(mesh, info);
}

function resetPhotos(num)
{
  var maxNum = num + 2;
  for(var i = num; num <= maxNum; num++)
  {
    if(num < 10)
    {
      num = '0' + num;
    }

    resetPhoto(eval('photo' + num), eval('photo' + num + 'Info'));
  }
}

function resetPhoto(mesh, info)
{
  mesh.position.set( info.position.x , info.position.y , info.position.z);
  mesh.rotation.set( info.rotation.x, info.rotation.y, info.rotation.z);
}

function resetGroup(num)
{
  eval('var pos = group0' + num + 'Pos');
  eval('group0' + num).position.x = pos.x;
  eval('group0' + num).position.y = pos.y;
  eval('group0' + num).position.z = pos.z;
}



function setPolyhedron(col, coordinate, group){
  for(var i = 0; i < 6; i++)
  {

    var geo_type = geo_type_arr[Math.floor(Math.random() * 4)];
    switch(geo_type){
      case 4:
        var geometry = new THREE.TetrahedronGeometry( 80 );
        break;
      case 6:
        var geometry = new THREE.CubeGeometry( 80 );
        break;
      case 8:
        var geometry = new THREE.OctahedronGeometry( 80 );
        break;
      case 20:
        var geometry = new THREE.IcosahedronGeometry( 80 );
        break;
      default:break;
    }

    if(col == 'blue')
    {
      //青系
      var mesh = new THREE.Mesh( setBlueCol(geometry, geo_type), new THREE.MeshBasicMaterial( { vertexColors: THREE.FaceColors } ) );
    }
    else
    {
      //赤系
      var mesh = new THREE.Mesh( setRedCol(geometry, geo_type), new THREE.MeshBasicMaterial( { vertexColors: THREE.FaceColors } ) );
    }



    var vertices = mesh.geometry.vertices;
    var originalVertices = getVertices(vertices);
    var randomVertices = getRandomVertices(originalVertices, 80);
    moveVertices(vertices, randomVertices);



    var obj = coordinate[i];
    mesh.position.set( obj.x , obj.y , obj.z);

    group.add( mesh );
    geo_arr.push(mesh);
  }
}

function getMaterial(url)
{
  return new THREE.MeshBasicMaterial( {
    map:THREE.ImageUtils.loadTexture(url, {})
  } );
}



/*

RESIZE

*/

$(window).on('resize', function(){
  resize_mv();
});

function resize_mv(){
  width = window.innerWidth;
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(width, height);

  camera.aspect = width / height;
  camera.far = 5000;
  camera.updateProjectionMatrix();

//  can.width = width;

}

