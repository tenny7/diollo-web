Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('street');
            $table->string('city', 50);
            $table->string('state', 2);
            $table->string('zip', 12);
            $table->string('phone', 30)->nullable();
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->timestamps();
        });

        
$circle_radius = 3959;
$max_distance = 20;
$lat = {your_lat};
$lng = {your_lng};

 return $candidates = DB::select(
               'SELECT * FROM
                    (SELECT id, name, address, phone, latitude, longitude, (' . $circle_radius . ' * acos(cos(radians(' . $lat . ')) * cos(radians(latitude)) *
                    cos(radians(longitude) - radians(' . $lng . ')) +
                    sin(radians(' . $lat . ')) * sin(radians(latitude))))
                    AS distance
                    FROM candidates) AS distances
                WHERE distance < ' . $max_distance . '
                ORDER BY distance
                OFFSET 0
                LIMIT 20;
            ');