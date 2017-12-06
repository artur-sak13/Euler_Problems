def palindromeChecker(numberStr):
    counter = 0
    for k in range(len(numberStr)):
        if (numberStr[k] != numberStr[length - 1 - k]):
            counter += 1

    if counter > 0:
        return False
    
    else:
        return True

max = 0

for i in range(100, 999):
    
    for j in range(100, 999):
        product = i * j
        numberStr = str(product)
        length = len(numberStr)
        
        if palindromeChecker(numberStr):
            
            if max < product:
                max = product

print("Max: " + str(max))