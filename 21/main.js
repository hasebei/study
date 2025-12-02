// シーン、カメラ、レンダラーのセットアップ
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true });

// ヒーローコンテナのDOM要素を取得
const container = document.querySelector('.hero-container');

// 画面サイズをコンテナに合わせる
renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);

// 背景色を設定 (CSSの背景色と合わせると自然)
scene.background = new THREE.Color(0x111111);

// ジオメトリ（立方体）とマテリアルの作成
const geometry = new THREE.BoxGeometry(1, 1, 1);
const material = new THREE.MeshBasicMaterial({ color: 0xffcccc, wireframe: true }); // シアン色のワイヤーフレーム
const cube = new THREE.Mesh(geometry, material);
scene.add(cube);

// ライトの追加（ワイヤーフレームなのでなくても動作しますが、リアルなオブジェクトでは必須）
const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
scene.add(ambientLight);

const pointLight = new THREE.PointLight(0xffffff, 1);
pointLight.position.set(5, 5, 5);
scene.add(pointLight);

// カメラの位置調整
camera.position.z = 5;

// アニメーションループの定義
function animate() {
    requestAnimationFrame(animate); // ブラウザの再描画に合わせて繰り返し呼び出す

    // オブジェクトを回転させる
    cube.rotation.x += 0.005;
    cube.rotation.y += 0.005;

    renderer.render(scene, camera);
}

// リサイズイベントのハンドリング
function onWindowResize() {
    // コンテナの新しいサイズを取得
    const width = container.clientWidth;
    const height = container.clientHeight;

    // カメラのアスペクト比とレンダラーのサイズを更新
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
}

// イベントリスナーを追加
window.addEventListener('resize', onWindowResize, false);

// アニメーションの開始
animate();