package com.example.bluetooth_demo;

import android.os.Bundle;
import android.widget.ToggleButton;
import android.bluetooth.BluetoothAdapter;
import android.content.Context;
import android.net.wifi.WifiManager;
import android.os.Bundle;

import android.widget.CompoundButton;
import android.widget.TextView;
import android.widget.ToggleButton;
import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    ToggleButton toggleButton;
    TextView textView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Getting toggle button and textView from activity_main
        toggleButton = (ToggleButton) findViewById(R.id.toggleButton);
        textView = (TextView) findViewById(R.id.textView);

        // Put listener on toggle button
        toggleButton.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean checked) {
                if (checked) {
                    textView.setText("Bluetooth is ON");
                    BluetoothAdapter adapter = BluetoothAdapter.getDefaultAdapter();
                    adapter.enable();
                } else {
                    textView.setText("Bluetooth is OFF");
                    BluetoothAdapter adapter = BluetoothAdapter.getDefaultAdapter();
                    adapter.disable();
                }
            }
        });
        // For initial setting
        if (toggleButton.isChecked()) {
            textView.setText("Bluetooth is ON");
            BluetoothAdapter adapter = BluetoothAdapter.getDefaultAdapter();
            adapter.enable();
        } else {
            textView.setText("Bluetooth is OFF");
            BluetoothAdapter adapter = BluetoothAdapter.getDefaultAdapter();
            adapter.disable();
        }
    }
}