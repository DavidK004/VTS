counter = 1;
for a = 0.01 : 0.01 : 7.08
  for b = 0.01 : 0.01 : 7.08
    for c = 0.01 : 0.01 : 7.08
      for d = 0.01 : 0.01 : 7.08
        mySum = a+b+c+d;
        if(mySum == 7.11)
          myProduct = a*b*c*d;
          if(myProduct == 7.11)
            return
          end
        end

        counter = counter + 1;
        if(rem(counter, 100000) == 0)
          counter
        end
      endfor
    endfor
  endfor
endfor
