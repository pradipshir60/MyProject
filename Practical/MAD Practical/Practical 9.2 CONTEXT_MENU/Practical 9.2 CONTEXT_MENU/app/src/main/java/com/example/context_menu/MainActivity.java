package com.example.context_menu;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.os.Bundle;
import android.view.ContextMenu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    Button b;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        b=(Button)findViewById(R.id.b1);
        registerForContextMenu(b);

    }

    @Override
    public void onCreateContextMenu(ContextMenu menu, View v, ContextMenu.ContextMenuInfo menuInfo) {
        getMenuInflater().inflate(R.menu.cmenu,menu);
        super.onCreateContextMenu(menu, v, menuInfo);
    }

    @Override
    public boolean onContextItemSelected(@NonNull MenuItem item) {
        int itemid;
        itemid=item.getItemId();
        if(itemid==R.id.cm1)
          Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();


        if(itemid==R.id.cm2)
            Toast.makeText(getApplicationContext(),"Demo",Toast.LENGTH_SHORT).show();

        if(itemid==R.id.cm3)
            Toast.makeText(getApplicationContext(),"Test",Toast.LENGTH_SHORT).show();

        return super.onContextItemSelected(item);
    }
}