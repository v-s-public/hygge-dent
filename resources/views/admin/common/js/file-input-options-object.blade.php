<script>
    function getFileInputOptions(isUpdateAction = null, imageUrl = null, caption = null) {
        if (!isUpdateAction) {
            return {
                showUpload: false,
                dropZoneEnabled: false,
                maxFileCount: 1,
                mainClass: "input-group",
                language: 'ru',
                fileActionSettings: {
                    showZoom: false
                }
            }
        } else {
            return {
                showUpload: false,
                dropZoneEnabled: false,
                maxFileCount: 1,
                mainClass: "input-group",
                language: 'ru',
                fileActionSettings: {
                    showZoom: false,
                    showRemove: false
                },
                initialPreview: [
                    '<img src="' + imageUrl + '" class="file-preview-image" />'
                ],
                initialPreviewConfig: [
                    {
                        caption: caption,
                    }
                ]
            }
        }
    }
</script>
