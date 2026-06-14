# Patches

## frappe-esbuild-utils.patch

**Problem:** The bench directory is named `Edupro SMS` (with a space). Node.js resolves
`__dirname` to the real path (with space), while some operations use the symlink path
`/home/frappe/edupro-sms`. This causes `path.relative()` to produce incorrect relative
paths which when resolved from `/tmp/tmpXXX` gives `/edupro-sms/...` — triggering
`mkdir` permission errors during `bench build`.

**Fix:** Add `fs.realpathSync(bench_path)` immediately after `bench_path` is set.

**File:** `apps/frappe/esbuild/utils.js`
**Frappe version:** 15.111.1
