Sub Interpolar()
'
' Interpolar Macro
' Interpola los datos del perfil a un intervalo fijo
'

aux = 1
While Range("B8").Offset(aux, 0) > 1

    Range("E8:I8").Select
    Application.CutCopyMode = False
    Selection.Copy
    Range("E8").Offset(aux, 0).Select
    ActiveSheet.Paste
    aux = aux + 1
Wend

Range("T2") = "Procesando..."
    'definición de variables
    intervalo = Range("M2") 'intervalo de interpolación
    posini = 0 'posición de dato inicial interpolación
    posfin = posini + 1 'posición dato final interpolación
    dh = 0 'distancia horizontal a interpolar
    cont = 1 'contador de datos interpolados
    
    If Range("h7") = 0 Then
    Range("C7") = 0.0001
    End If
    
    While Range("h6").Offset(posfin, 0) > 0
    
    If Range("h6").Offset(posini, 0) <= dh Then
    If dh <= Range("h6").Offset(posfin, 0) Then
    'det m
    m = (Range("i6").Offset(posfin, 0) - Range("i6").Offset(posini, 0)) / (Range("h6").Offset(posfin, 0) - Range("h6").Offset(posini, 0))
    'det b
    b = Range("i6").Offset(posini, 0) - m * Range("h6").Offset(posini, 0)
            
    'guardar dato
    Range("j5").Offset(cont, 0) = dh
    Range("k5").Offset(cont, 0) = dh * m + b
    cont = cont + 1
    dh = dh + intervalo
    Else
    posini = posini + 1
    posfin = posfin + 1
    End If
    End If
    Wend
    Range("T2") = "Terminado"
    Range("J6").Select
End Sub
