#!/usr/bin/env sh

dir=$(cd "${0%[/\\]*}" > /dev/null; cd "../mtdowling/jmespath.php/bin" && pwd)

if [ -d /proc/cygdrive ] && [[ $(which php) == $(readlink -n /proc/cygdrive)/* ]]; then
   # We are in Cygwin using Windows php, so the path must be translated
   dir=$(cygpath -m "$dir");
fi

"${dir}/jp.php" "$@"
