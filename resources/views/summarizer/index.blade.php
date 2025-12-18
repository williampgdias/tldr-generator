<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TL;DR Generator ⚡</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-slate-50 min-h-screen flex py-10 justify-center">
    <div class="w-full max-w-3xl px-4">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">TL;DR Generator ⚡️</h1>
            <p class="text-lg text-slate-600 mt-2">Paste long texts below and get the key points instantly.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 sm:p-8">
            <form id="summarizeForm" class="space-y-6">
                <div>
                    <label for="text" class="block text-sm font-medium text-slate-700 mb-1">Long Text / Document</label>
                    <textarea
                        id="textInput"
                        rows="8"
                        class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-slate-50 p-3 text-sm"
                        placeholder="Paste your article, email, or report here..."
                        required></textarea>

                </div>
                <button
                    type="submit"
                    id="submitBtn"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all disable:opacity-50 disabled:cursor-not-allowed">
                    🚀 Summarize Now
                </button>
            </form>

            <div id="loadingState" class="hidden mt-8 text-center py-4">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto mb-3"></div>
                <p class="text-slate-500 text-sm">Reading and summarizing...</p>
            </div>

            <div id="resultSection" class="hidden mt-8 pt-8 border-t border-slate-100">
                <h3 class="text-lg font-bold text-slate-800 mb-4">✨ Key Takeaways:</h3>
                <div id="summaryContent" class="prose prose-blue prose-sm max-w-none text-slate-700"></div>
            </div>

            <div id="errorSection" class="hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm"></div>
        </div>
    </div>
</body>

</html>