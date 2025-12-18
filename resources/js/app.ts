import "./bootstrap";

// Grab Elements
const form = document.getElementById("summarizeForm") as HTMLFormElement;
const textInput = document.getElementById("textInput") as HTMLTextAreaElement;
const submitBtn = document.getElementById("submitBtn") as HTMLButtonElement;

const loadingState = document.getElementById("loadingState") as HTMLDivElement;
const resultSection = document.getElementById(
    "resultSection"
) as HTMLDivElement;
const summaryContent = document.getElementById(
    "summaryContent"
) as HTMLDivElement;
const errorSection = document.getElementById("errorSection") as HTMLDivElement;

// Helper to toggle visibility
const toggle = (el: HTMLElement, show: boolean) => {
    el.classList.toggle("hidden", !show);
};

// Handle Submit
form.addEventListener("submit", async (e) => {
    e.preventDefault();

    // Reset UI
    toggle(errorSection, false);
    toggle(errorSection, false);
    toggle(loadingState, true);
    submitBtn.disabled = true;
    submitBtn.innerText = "Processing...";

    const text = textInput.value;
    // Get CSRF Token from meta tag
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    try {
        // Send to Backend
        const response = await fetch("/summarize", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken || "",
            },
            body: JSON.stringify({ text }),
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || "Something went wrong.");
        }

        // Success! Render Result using a simple Markdown parser
        const rawText = data.summary;

        const lines = rawText.split("\n");
        let htmlContent = '<ul class="list-none space-y-2">';

        lines.forEach((line: string) => {
            line = line.trim();
            if (!line) return;

            line = line.replace(
                /\*\*(.*?)\*\*/g,
                '<strong class="font-bold text-slate-900">$1</strong>'
            );

            if (line.startsWith("* ") || line.startsWith(" ")) {
                const cleanLine = line.substring(2);
                htmlContent += `<li class="flex items-start">
                <span class="mr-2 text-blue-500">˲</span>
                <span>${cleanLine}</span>
                </li>`;
            } else {
                htmlContent += `<p class=""mb-2 text-slate-700">${line}</p>`;
            }
        });

        htmlContent += "</ul>";

        summaryContent.innerHTML = htmlContent;
        toggle(resultSection, true);
    } catch (error: any) {
        // Handle Error
        errorSection.innerText = `Error: ${error.message}`;
        toggle(errorSection, true);
    } finally {
        // Cleanup
        toggle(loadingState, false);
        submitBtn.disabled = false;
        submitBtn.innerText = "🚀 Summarize Now";
    }
});
