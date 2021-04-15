# freelancer-mastermind
This is an implementation of the mastermind game in php. I found this project on freelancer.com.
Purpose: The purpose of this project is to assist me in learning the fundamentals of php and to give me some basic freelancing experience.
Requirements:
php 7.1 or later.
Specifications:
1. Php will choose a sequence of 4 unique digits. The sequence is intended to be chosen randomly and will not be known to the user in advance.
2. The user will then be given 10 attempts to guess the sequence.
a. On each attempt, php will check whether the sequence supplied by the user is valid. A sequence is valid if:
I. it contains 4 characters and
II. all characters (except for whitespace at the beginning and end of the string) are digits.
b.
I. If the sequence is invalid, then php will print a message containing a description of the errors, but the invalid guess will not count against the attempt limit.
II. Otherwise, php will determine how many digits are correct, misplaced, or incorrect and the guess will count against the attempt limit.
3.
a. If the user has made 10 incorrect attempts, php will reveal the correct sequence.
b. Otherwise, php will print a message indicating that the user has won.
4. In either case, php will ask the user if they wish to play again.
a. Valid responses are y or n in either case.
b. if the user enters anything else, php will ask again.
5. Algorithm for matching correct answers
a. set a counter to 0
b. set an array of booleans to false.
c. For counter from 0 to 3 do
if guess[counter] == sequence[counter]
correct[counter] = true
end if
end for
return correct
6. Algorithm for finding misplaced digits
a. Retrieve the array of correct positions resulting from the application of rule 5.
b. Make a list of the digits of both the answer and sequence digits at the positions for which the correct answer array is false.
c. For each of the digits 0 through 9, count the number of instances of that digit in the lists created in the prior step. The number of misplaced digits is the smaller of the number of instances of this digit in the answer list and the number of instances in the sequence list.
d. Note that the sum of correct digits, misplaced digits, and incorrect digits should always be 4. Therefore, any digits that are not counted as correct or misplaced are incorrect.
Running the program
Navigate to the directory in which you have cloned this repository. Then, type php main.php.
