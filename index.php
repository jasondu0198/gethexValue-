<?php
// 定义颜色映射数组
$colors = [
    'red'    => '#FF0000',
    'green'  => '#00FF00',
    'blue'   => '#0000FF',
    'yellow' => '#FFFF00',
    'purple' => '#800080'
];

// 获取用户提交的颜色
$selectedColor = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST['color'] : null;
$hexValue = $selectedColor && array_key_exists($selectedColor, $colors)
    ? $colors[$selectedColor]
    : null;
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>颜色选择器</title>
</head>
<body>
    <h2>请选择一种颜色：</h2>

    <form method="post">
        <select name="color" required>
            <option value="">-- 请选择 --</option>
            <?php foreach ($colors as $name => $hex): ?>
                <option value="<?= $name ?>" <?= ($name === $selectedColor) ? 'selected' : '' ?>>
                    <?= ucfirst($name) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">提交</button>
    </form>

    <?php if ($hexValue): ?>
        <h3>你选择的颜色是：<span style="color:<?= $hexValue ?>"><?= ucfirst($selectedColor) ?></span></h3>
        <p>对应的 HEX 色值为：<?= $hexValue ?></p>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p style="color:red;">无效的选择，请重新选择颜色。</p>
    <?php endif; ?>
</body>
</html>
