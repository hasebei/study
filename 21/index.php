<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3Dヒーローセクション - Three.js</title>
    <style>
body {
    margin: 0;
    overflow-x: hidden; /* 横スクロール防止 */
}

.hero-container {
    /* ヒーローセクションのサイズと配置を定義 */
    position: relative;
    width: 100%;
    height: 100vh; /* 画面の高さ全体を使う例 */
    background-color: #111; /* 3Dロード中の背景色 */
}

/* Three.jsのCanvas要素のスタイル */
.hero-container canvas {
    display: block;
    position: absolute; /* 親コンテナ内で絶対位置指定 */
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
    z-index: 10; /* HTMLコンテンツより下に配置 */
}

/* HTMLコンテンツのスタイル (Canvasの上に重ねる) */
.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* 中央寄せ */
    color: white;
    text-align: center;
    z-index: 20; /* Canvasより上に配置 */
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

h1 {
    font-size: 3em;
    margin-bottom: 0.5em;
}

.cta-button {
    background-color: #007bff;
    color: white;
    padding: 10px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2em;
    margin-top: 20px;
}
    </style>
</head>
<body>

    <div class="hero-container">
        <div class="hero-content">
            <h1>未来を創造する技術</h1>
            <p>Three.jsで実現する革新的な体験</p>
            <button class="cta-button">資料請求はこちら</button>
        </div>
    </div>

    <section style="height: 1000px; background-color: #f4f4f4; padding-top: 50px;">
        <h2>他のコンテンツセクション</h2>
        <p>3Dはメインビューに限定し、スクロールすると通常のコンテンツが表示されます。</p>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="main.js"></script>
</body>
</html>