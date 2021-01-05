<script>
    function str_slug(value) {
        var pattern = /[\u0600-\u06FF\u0750-\u077F]/;
        if (!pattern.test(value)) {
            var rExps = [
                {re: /[\xC0-\xC6]/g, ch: 'A'},
                {re: /[\xE0-\xE6]/g, ch: 'a'},
                {re: /[\xC8-\xCB]/g, ch: 'E'},
                {re: /[\xE8-\xEB]/g, ch: 'e'},
                {re: /[\xCC-\xCF]/g, ch: 'I'},
                {re: /[\xEC-\xEF]/g, ch: 'i'},
                {re: /[\xD2-\xD6]/g, ch: 'O'},
                {re: /[\xF2-\xF6]/g, ch: 'o'},
                {re: /[\xD9-\xDC]/g, ch: 'U'},
                {re: /[\xF9-\xFC]/g, ch: 'u'},
                {re: /[\xC7-\xE7]/g, ch: 'c'},
                {re: /[\xD1]/g, ch: 'N'},
                {re: /[\xF1]/g, ch: 'n'}];

                    {{-- convert chars with accents to normal chars --}}
            for (var i = 0, len = rExps.length; i < len; i++)
                value = value.replace(rExps[i].re, rExps[i].ch);

            return value.toLowerCase()
                .replace(/\s+/g, '-') {{-- replace ' ' with '-' --}}
                .replace(/[^a-z0-9-]/g, '') {{-- remove special caracters --}}
                .replace(/\-{2,}/g, '-'); {{-- remove double '-' --}}
        } else {
            {{-- For arabic language : add '-' --}}
                return value.replace(/\s+/g, '-')
                .replace(/\-{2,}/g, '-');
        }
    }
</script>
