#!/usr/bin/env bash

source "$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)/../../../bash/common.lib.sh"

print_header "Uploading logs" "DeadOrAliveQuizz"
run_command "vendor/lakion/mink-debug-extension/travis/tools/upload-textfiles \"${DOA_QUIZZ_BUILD_DIR}/*.log\""

print_header "Uploading screenshots" "DeadOrAliveQuizz"
run_command "IMGUR_API_KEY=4907fcd89e761c6b07eeb8292d5a9b2a vendor/lakion/mink-debug-extension/travis/tools/upload-screenshots \"${DOA_QUIZZ_BUILD_DIR}/*.png\""
