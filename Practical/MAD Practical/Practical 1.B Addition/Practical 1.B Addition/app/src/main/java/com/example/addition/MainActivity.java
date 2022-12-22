package com.example.addition;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;


public class MainActivity extends AppCompatActivity {
    EditText mNum1, mNum2;
    Button btnadd;
    TextView answer;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mNum1 = (EditText) findViewById(R.id.number_1);
        mNum2 = (EditText) findViewById(R.id.number_2);
        btnadd = (Button) findViewById(R.id.addbtn);
        //answer=(TextView)findViewById(R.id.result);
        onAdd();

    }

    private void onAdd() {
        btnadd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int num1 = Integer.parseInt(mNum1.getText().toString());
                int num2 = Integer.parseInt(mNum2.getText().toString());
                int res = num1 + num2;
                //answer.setText(Integer.toString(res));
                Toast.makeText(MainActivity.this, "The Result is " + res, Toast.LENGTH_SHORT).show();


            }
        });

    }

}