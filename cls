[1mdiff --git a/routes/api.php b/routes/api.php[m
[1mindex b17153b..738ecc8 100644[m
[1m--- a/routes/api.php[m
[1m+++ b/routes/api.php[m
[36m@@ -17,6 +17,6 @@[m
 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {[m
     return $request->user();[m
 });[m
[31m-Route::middleware('auth:sanctum')->get('/user', function (Request $request) {[m
[32m+[m[32mRoute::middleware('auth:abubakar')->get('/user', function (Request $request) {[m
     return $request->user();[m
 });[m
