<?php
// index.php（Search Dokidoki - Top）

$shortcuts = [
  ["label" => "管理画面", "href" => "/admin/",     "icon" => "A"],
  ["label" => "マニュアル", "href" => "/manual/",  "icon" => "M"],
  ["label" => "お問い合わせ", "href" => "/contact/","icon" => "C"],
  ["label" => "設定", "href" => "/settings/",      "icon" => "S"],
  ["label" => "ヘルプ", "href" => "/help/",        "icon" => "H"],
];

$searchAction = "/search.php";
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Search Dokidoki</title>

  <!-- Tailwind CDN（新規開発向け） -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- 任意：CDN版でも少しだけカスタムしたい場合 -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          boxShadow: {
            soft: "0 1px 6px rgba(32,33,36,.28)",
          }
        }
      }
    }
  </script>
</head>

<body class="bg-white text-gray-900">
  <main class="min-h-screen">
    <div class="mx-auto max-w-[680px] px-6 pt-24 sm:pt-28">
      <!-- ロゴ -->
      <h1 class="text-center font-semibold text-5xl sm:text-6xl tracking-tight select-none">
        <span class="text-blue-600">S</span><span class="text-red-500">e</span><span class="text-yellow-500">a</span><span class="text-blue-600">r</span><span class="text-green-600">c</span><span class="text-red-500">h</span>
        <span class="text-gray-900"> Dokidoki</span>
      </h1>

      <!-- 検索フォーム -->
      <form action="<?php echo htmlspecialchars($searchAction, ENT_QUOTES, 'UTF-8'); ?>" method="get" class="mt-8">
        <div class="h-12 w-full rounded-full border border-gray-200 bg-white px-4 flex items-center gap-3
                    hover:shadow-soft focus-within:shadow-soft focus-within:border-blue-500 transition">
          <!-- 左：虫眼鏡 -->
          <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="currentColor" stroke-width="2"/>
            <path d="M16.5 16.5 21 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>

          <input
            type="text"
            name="q"
            class="flex-1 text-base text-gray-900 placeholder:text-gray-500 outline-none"
            placeholder="Search Dokidoki で検索または URL を入力"
            autocomplete="off"
            spellcheck="false"
          />

          <!-- 右：音声（ダミー） -->
          <button type="button" class="p-2 rounded-full hover:bg-gray-100 text-gray-500 transition"
                  aria-label="音声検索（ダミー）">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M12 14a3 3 0 0 0 3-3V6a3 3 0 1 0-6 0v5a3 3 0 0 0 3 3Z" stroke="currentColor" stroke-width="2"/>
              <path d="M19 11a7 7 0 0 1-14 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              <path d="M12 18v3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              <path d="M9 21h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>

          <!-- 検索ボタン -->
          <button type="submit" class="px-4 py-2 rounded-full bg-gray-900 text-white text-sm hover:bg-gray-800 transition">
            検索
          </button>
        </div>

        <!-- 任意：補足 -->
        <p class="mt-3 text-center text-xs text-gray-400">
          Enterでも検索できます
        </p>
      </form>

      <!-- ショートカット -->
      <section class="mt-10">
        <div class="grid grid-cols-3 sm:grid-cols-5 gap-x-6 gap-y-5 justify-items-center">
          <?php foreach ($shortcuts as $sc): ?>
            <a href="<?php echo htmlspecialchars($sc["href"], ENT_QUOTES, "UTF-8"); ?>"
               class="group w-20 flex flex-col items-center"
               aria-label="<?php echo htmlspecialchars($sc["label"], ENT_QUOTES, "UTF-8"); ?>">
              <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center
                          group-hover:bg-gray-200 transition">
                <span class="font-semibold text-gray-700">
                  <?php echo htmlspecialchars($sc["icon"], ENT_QUOTES, "UTF-8"); ?>
                </span>
              </div>
              <div class="mt-2 text-xs text-gray-800 text-center leading-tight">
                <?php echo htmlspecialchars($sc["label"], ENT_QUOTES, "UTF-8"); ?>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </section>

      <footer class="mt-16 pb-10 text-center text-xs text-gray-400">
        © <?php echo date("Y"); ?> Dokidoki
      </footer>
    </div>
  </main>
</body>
</html>
