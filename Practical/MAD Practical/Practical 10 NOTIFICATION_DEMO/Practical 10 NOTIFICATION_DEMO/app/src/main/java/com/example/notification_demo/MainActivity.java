package com.example.notification_demo;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.NotificationChannelCompat;
import androidx.core.app.NotificationCompat;
import androidx.core.app.NotificationManagerCompat;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    Button notify_btn;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        notify_btn= findViewById(R.id.notify_btn);



            if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.O) {
                NotificationChannel channel=new NotificationChannel("My Notification","My Notification", NotificationManager.IMPORTANCE_DEFAULT);
                NotificationManager manager =getSystemService(NotificationManager.class);
                manager.createNotificationChannel(channel);

            }



        notify_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                NotificationCompat.Builder builder=new NotificationCompat.Builder(MainActivity.this,"My Notification");
                builder.setContentTitle("Hello");
                builder.setSmallIcon(R.drawable.ic_launcher_foreground);

                builder.setContentText("This is notification demo");
                builder.setAutoCancel(true);

                NotificationManagerCompat managerCompat= NotificationManagerCompat.from(MainActivity.this);
                managerCompat.notify(1,builder.build());







            }
        });

    }
}