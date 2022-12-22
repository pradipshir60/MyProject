package com.example.firebase_demo;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void process(View view) {
        TextView t1 = (TextView) findViewById(R.id.t1);
        FirebaseDatabase db=FirebaseDatabase.getInstance();
        DatabaseReference root= db.getReference();
        root.setValue(t1.getText().toString());
        Toast.makeText(getApplicationContext(),"Inserted",Toast.LENGTH_LONG).show();

        

    }
}