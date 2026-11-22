<#
.SYNOPSIS
    Собирает архив dist/zigbee2mqtt.tgz для Маркета дополнений MajorDoMo.

.DESCRIPTION
    Внутри архива не должно быть родительской папки: все пути относительные
    от корня MajorDoMo. Скрипт собирает временный каталог, упаковывает только
    необходимые файлы и удаляет из библиотеки vis.js лишние разделы (docs,
    examples, test, карты исходников), чтобы архив оставался компактным.

.EXAMPLE
    powershell -ExecutionPolicy Bypass -File build_package.ps1
#>
param(
    [string]$Output = 'dist/zigbee2mqtt.tgz'
)

$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent $MyInvocation.MyCommand.Path
$stage = Join-Path $env:TEMP ('z2m_build_' + [guid]::NewGuid().ToString('N'))
New-Item -ItemType Directory -Force -Path $stage | Out-Null

# Обязательные элементы пакета. Папка languages появится в одном из следующих
# релизов, поэтому её отсутствие не считается ошибкой.
$items = @(
    'modinfo.json',
    'module.xml',
    'install.php',
    'readme.md',
    'CHANGELOG.md',
    'docs',
    'languages',
    'img',
    'modules',
    'scripts',
    'templates'
)

$packed = @()
foreach ($item in $items) {
    $source = Join-Path $root $item
    if (-not (Test-Path $source)) {
        if ($item -eq 'languages') {
            Write-Host 'Папка languages ещё не создана — пропускаем.'
            continue
        }
        throw "Не найден элемент для упаковки: $item"
    }
    Copy-Item -Path $source -Destination (Join-Path $stage $item) -Recurse -Force
    $packed += $item
}

# Локальная копия словарей: она нужна при ручной установке только папки modules/.
$languages = Join-Path $root 'languages'
if (Test-Path $languages) {
    foreach ($moduleDir in @('zigbee2mqtt')) {
        $target = Join-Path $stage ('modules/' + $moduleDir + '/languages')
        New-Item -ItemType Directory -Force -Path $target | Out-Null
        Copy-Item -Path (Join-Path $languages ($moduleDir + '_*.php')) -Destination $target -Force
    }
}

# Очистка vis.js: модулю нужны только dist/vis.js и dist/vis-network.min.css.
$visRoot = Join-Path $stage 'templates/zigbee2mqtt/vis-4.21.0'
if (Test-Path $visRoot) {
    foreach ($dir in @('docs', 'examples', 'test', 'lib', 'misc', '.github')) {
        $path = Join-Path $visRoot $dir
        if (Test-Path $path) {
            Remove-Item -Path $path -Recurse -Force
        }
    }
    $maps = Join-Path $visRoot 'dist'
    Get-ChildItem -Path $maps -Filter '*.map' -File -ErrorAction SilentlyContinue | Remove-Item -Force
}

$outputPath = Join-Path $root $Output
New-Item -ItemType Directory -Force -Path (Split-Path -Parent $outputPath) | Out-Null
if (Test-Path $outputPath) {
    Remove-Item $outputPath -Force
}

Push-Location $stage
try {
    & tar -czf $outputPath @packed
    if ($LASTEXITCODE -ne 0) {
        throw "tar завершился с кодом $LASTEXITCODE"
    }
} finally {
    Pop-Location
    Remove-Item $stage -Recurse -Force -ErrorAction SilentlyContinue
}

$size = (Get-Item $outputPath).Length
Write-Host "Готово: $outputPath ($size байт)"
