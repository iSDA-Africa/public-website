CMS.registerEditorComponent({
    id: "image-annotation",
    label: "Image annotation",
    fields: [
        {
            name: "text",
            label: "Annotation Text",
            widget: "string",
        },
        {
            name: "text-class",
            label: "Text CSS Class (optional)",
            widget: "string",
        }
    ],
    pattern: /^{{<\s*image-annotation(?:\s+text-class="([^"]*)")?\s*>}}([\s\S]*?){{<\s*\/image-annotation\s*>}}$/m,
    fromBlock: function (match) {
        return {
            text: match[2],
            "text-class": match[1] || "",
        };
    },
    toBlock: function (obj) {
        return `{{< image-annotation ${obj["text-class"] ? ` text-class="${obj["text-class"]}"` : ""} >}}${obj["text"]}{{< /image-annotation >}}`;
    },
    toPreview: function (obj) {
        const textClass = obj["text-class"] ? obj["text-class"] : "";
        return `<div class="row justify-content-center mt-3">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <p class='${textClass}'
                   style="font-size:13px">${obj["text"]}</p>
            </div>
        </div>`;
    }
});